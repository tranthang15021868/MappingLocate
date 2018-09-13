<?php

namespace App\Console\Commands;

use App\Services\CitiesService;
use App\Services\GroupsService;
use App\Services\ProvinceGroupService;
use App\Services\ProvincesService;
use App\Services\SuperMarketService;
use App\Services\UtilitiesService;
use Helpers\CrawlHelper;
use Illuminate\Console\Command;

ini_set('max_execution_time', 0);

class CrawlStoreCommand extends Command
{
    protected $LinkAreaService;
    protected $SuperMarketService;
    protected $GroupsService;
    protected $CitiesService;
    protected $ProvincesService;
    protected $ProvinceGroupService;
    protected $UtilitiesService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crawlstore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SuperMarketService $superMarketService,
                                GroupsService $groupsService,
                                CitiesService $citiesService,
                                ProvincesService $provincesService,
                                ProvinceGroupService $provinceGroupService,
                                UtilitiesService $utilitiesService
    ) {
        parent::__construct();

        $this->SuperMarketService = $superMarketService;
        $this->GroupsService = $groupsService;
        $this->CitiesService = $citiesService;
        $this->ProvincesService = $provincesService;
        $this->ProvinceGroupService = $provinceGroupService;
        $this->UtilitiesService = $utilitiesService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->saveLinkArea();
        $list_group_service = $this->ProvinceGroupService->getAll();
        foreach ($list_group_service as $k=>$val){
            $province = $this->ProvincesService->find($val['province_id']);
            $group = $this->GroupsService->find($val['group_id']);
            $href = 'https://supermarket.geomedian.com/'.$province['slug'].'/'.$group['slug'];
            $html_str = $this->parseLink($href);
            $list_coop = $html_str->find('#contents_body .z-depth-1 #shoplist div ul li');
            foreach($list_coop as $key_s=>$value){
                $link_coop_parent = $value->find('a')[0]->getAttribute('href');
                $html_str_coop = $this->parseLink($link_coop_parent);
                $html_str_map = $this->parseLink($link_coop_parent.'/map/');
                //data
                $lat = $html_str_map->find('#page_latitude')[0]->getAttribute('content');
                $long = $html_str_map->find('#page_longitude')[0]->getAttribute('content');
                $name = str_replace('の店舗情報','',$html_str_coop->find('#shopdata h2')[0]->innertext());
                $address = $html_str_coop->find('#shopdata dl')[0]->find('dd')[0]->text();
                $nearest_station = $html_str_coop->find('#shopdata dl')[1]->find('dd')[0]->text();
                $store_type = $html_str_coop->find('#shopdata dl')[2]->find('dd')[0]->text();
                $note = $html_str_coop->find('#shopdata dl')[3]->find('dd')[0]->text();
                $city = str_replace('https://supermarket.geomedian.com/','',$link_coop_parent);
                $cities_name =  trim($html_str_map->find('#breadcrumb ol li')[2]->text());

                $province_id = $this->ProvincesService->findItemBy(['name'=>$province['name']])->id;
                $city_preg = preg_replace('/[0-9]|\//', '', $city);
                //get id

                $this->CitiesService->updateOrCreate(['name'=>$cities_name],['slug'=>$city_preg,'province_id'=>$province_id,'name'=>$cities_name]);
                $city_id = $this->CitiesService->findItemBy(['name'=>$cities_name])->id;
                $data = [
                    'province_group_id'=>$val['id'],
                    'city_id'=>$city_id,
                    'nearest_station'=>trim($nearest_station),
                    'store_type'=>trim($store_type),
                    'store_id'=> preg_replace('/[^0-9]/', '', $link_coop_parent),
                ];

                $data_utilities = [
                    'name'=>trim($name),
                    'address'=>trim($address),
                    'memo'=>trim($note),
                    'lat'=>$lat,
                    'long'=>$long
                ];
                if($this->SuperMarketService->findItemBy(['store_id'=>$data['store_id']])){
                    $store_id = $this->SuperMarketService->findItemBy(['store_id'=>$data['store_id']])->id;
                    $utilities_id = $this->SuperMarketService->findItemBy(['store_id'=>$data['store_id']])->utilities_id;
                    $this->SuperMarketService->update($store_id,$data);
                    $this->UtilitiesService->update($utilities_id,$data_utilities);
                }else{
                    $id = $this->UtilitiesService->insertGetId($data_utilities);
                    $data['utilities_id'] = $id;
                    $this->SuperMarketService->insert($data);
                }
            }
        }
    }

    public function saveLinkArea(){
        $array_list_area = $this->getListArea();

        foreach($array_list_area as $key=>$val){
            $html_str = $this->parseLink($val['link']);
            $list_coop_parent = $html_str->find('#contents #contents_left .z-depth-1 #category_linklist ul li');
            foreach($list_coop_parent as $key_s=>$value){
                $link_coop_parent = $value->find('a')[0]->getAttribute('href');
                $name_group = $value->find('a')[0]->nodes[0]->text();
                $link_area = str_replace('https://supermarket.geomedian.com/','',$link_coop_parent);
                $city = preg_replace('/\/(.+?)\//', '', $link_area);
                $store_group =  preg_replace('/\//', '', str_replace($city.'/','',$link_area));
                //save data

                $this->ProvincesService->updateOrCreate(['name'=>$val['name_city']],['slug'=>$city,'name'=>$val['name_city']]);
                $this->GroupsService->updateOrCreate(['slug'=>$store_group],['slug'=>$store_group,'name'=>$name_group]);
                $province_id =  $this->ProvincesService->findItemBy(['name'=>$val['name_city']])->id;
                $group_id =  $this->GroupsService->findItemBy(['slug'=>$store_group])->id;
                $article = $this->ProvincesService->find($province_id);
                $article->groups()->syncWithoutDetaching($group_id);
            }
        }
    }

    public function getListArea(){
        $link = 'https://supermarket.geomedian.com/area/';
        $html_str = $this->parseLink($link);
        $list_category = $html_str->find('#contents #contents_left .z-depth-1 #area_linklist ul li');

        foreach($list_category as $key=>$val){
            $link_area = $val->find('a')[0]->getAttribute('href');
            $name = $val->find('a')[0]->nodes[0]->text();
            $array_list_area[$key]['link'] = $link_area;
            $array_list_area[$key]['name_city'] = $name;
        }
        return $array_list_area;
    }

    function parseLink($href){
        $crawl = new CrawlHelper();
        $html = $crawl->crawlUrl($href, 'GET',[],[]);
        return $html;
    }
}
