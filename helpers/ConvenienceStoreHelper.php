<?php

namespace Helpers;

use App\Models\Categories;
use App\Services\AreasService;
use App\Services\CategoriesService;
use App\Services\CitiesService;
use App\Services\ConveniencesStoreService;
use App\Services\ProvincesService;
use App\Services\UtilitiesService;
use Illuminate\Support\Facades\Log;


/**
 * Created by PhpStorm.
 * User: khuongtd
 * Date: 9/21/16
 * Time: 11:23 AM
 */
class ConvenienceStoreHelper
{

    /**
     * TimeHelper constructor.
     */
    public function __construct()
    {
    }

    public function crawl()
    {
        try {
            $crawlData = new CrawlHelper();
            $html = $crawlData->crawlUrl('https://cvs-map.jp/');
            $pref_area = $html->find('.pref_area ');
            foreach ($pref_area as $pref_area_item) {
                $name = $pref_area_item->find('.left_area h3')[0]->innertext;
                $where = array('name' => $name);
                $areaId = $this->__saveArea(['name' => $name, 'slug' => str_slug($name, '-')], $where);
                $right_pref_area = $pref_area_item->find('.right_pref_area a');
                foreach ($right_pref_area as $right_pref_area_item) {
                    $name = $right_pref_area_item->innertext;
                    $where = array('name' => $name);
                    $pref_code = explode('/', $right_pref_area_item->href)[2];
                    $provinceId = $this->__saveProvince(['pref_code' => $pref_code, 'area_id' => $areaId,
                        'name' => $name, 'slug' => str_slug($name, ' - ')], $where);
                    $this->__saveCities($right_pref_area_item->href, $provinceId);
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::info('Line ' . $e->getLine() . ': ' . $e->getMessage());
        }
    }

    private function __saveCities($provinceUrl, $provinceId)
    {
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl('https://cvs-map.jp' . $provinceUrl);
        $city = $html->find('.city a');
        foreach ($city as $city_item) {
            $name = explode("（", $city_item->innertext)[0];
            $where = array('name' => $name);
            $cityId = $this->__findSave(CitiesService::class, ['province_id' => $provinceId,
                'name' => $name, 'slug' => str_slug($name, '-')], $where);
            $this->__saveStore($city_item->href, $cityId);
        }
    }

    private
    function __saveStore($cityUrl, $cityId)
    {
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl('https://cvs-map.jp' . $cityUrl);
        $spot = $html->find('.name a');
        foreach ($spot as $spot_item) {
            $utilitieId = $this->__saveUtilitie($spot_item->href);
            $this->__saveCVStore($spot_item->href, explode("/", $spot_item->href)[2], $utilitieId, $cityId);
        }
    }

    private
    function __saveCVStore($spotUrl, $spotId, $utilitieId, $cityId)
    {
        $cvStore = array();
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl('https://cvs-map.jp' . $spotUrl);
        $data = $html->find('#spot_info td');
        $cvStore['utilities_id'] = $utilitieId;
        $cvStore['store_code'] = $spotId;
        $cvStore['city_id'] = $cityId;
        $cvStore['phone'] = trim(@$data[1]->plaintext);
        $cvStore['bussiness_hour'] = trim(@$data[3]->plaintext);
        $cvStore['allow_eat_in'] = trim(@$data[5]->plaintext) != '―' ? 1 : 0;
        $cvStore['electronic_money'] = trim(@$data[6]->plaintext);
        $cvStore['tax'] = trim(@$data[7]->plaintext) != '―' ? 1 : 0;
        $cvStore['package_shipping'] = trim(@$data[8]->plaintext);
        $cvStore['package_receipt'] = trim(@$data[9]->plaintext);
        $cvStore['locker'] = trim(@$data[10]->plaintext);
        $cvStore['administrative_service'] = trim(@$data[11]->plaintext);
        $cvStore['website'] = trim(@$data[14]->plaintext);
        $cvStore['nearest_station'] = trim(@$data[15]->plaintext);
        $cvStore['nearest_bus_stop'] = trim(@$data[16]->plaintext);
        $this->__save(ConveniencesStoreService::class, $cvStore);
    }

    private
    function __saveUtilitie($spotUrl)
    {
        $utilitie = array();
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl('https://cvs-map.jp' . $spotUrl);
        $utilitie['name'] = $html->find('.spot_name h2', 0)->innertext;
        $data = $html->find('#spot_info td');
        $other_true = $data[4]->find('.other_true');
        $memo = "";
        foreach ($other_true as $other_true_item) {
            $memo .= $other_true_item->plaintext . " 、 ";
        }
        $memo .= trim(@$data[12]->plaintext) . ' 、 ';
        $memo .= trim(@$data[13]->plaintext) . ' 、 ';
        $utilitie['memo'] = $memo;
        $utilitie['type'] = Categories::TYPE_CONVENIENCE_STORE;
        $utilitie['address'] = @$data[0]->innertext;
        $name = trim(@$data[2]->plaintext);
        $where = array('name' => $name);
        $utilitie['category_id'] = $this->__saveCategory($where, ['type'=>Categories::TYPE_CONVENIENCE_STORE,'name' => $name, 'slug' => str_slug($name, '-')]);
        if (($LatLng1 = @$html->find('.map_link a', 0)->href)[1]
            && $LatLng2 = @explode('=', $LatLng1)[1]) {
            $LatLng = explode('%2C', $LatLng2);
            $utilitie['lat'] = $LatLng[0];
            $utilitie['long'] = $LatLng[1];
        }
        return $this->__save(UtilitiesService::class, $utilitie);
    }

    private
    function __saveCategory($arr, $where)
    {
        return $this->__findSave(CategoriesService::class, $arr, $where);
    }

    private
    function __save($table, $arr)
    {
        $model = new $table;
        return $model->create($arr)->id;
    }

    private
    function __saveProvince($arr, $where)
    {
        return $this->__findSave(ProvincesService::class, $arr, $where);
    }

    private
    function __saveArea($arr, $where)
    {
        return $this->__findSave(AreasService::class, $arr, $where);
    }

    private
    function __findSave($table, $arr, $where)
    {
        $model = new $table;
        return $model->updateOrCreate($where, $arr)->id;
    }
}