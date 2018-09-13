<?php

namespace App\Console\Commands;

use App\Services\SuperMarketService;
use Helpers\CrawlHelper;
use Illuminate\Console\Command;

ini_set('max_execution_time', 0);

class CrawlStoreItoyokadoCommand extends Command
{

    protected $SuperMarketService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:itoyokado';

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
    public function __construct(SuperMarketService $superMarketService) {
        parent::__construct();
        $this->SuperMarketService = $superMarketService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $html_str = $this->parseLink('http://blog.itoyokado.co.jp/shop/121/index.html');
        $address = $html_str->find('title')[0]->text();
//        $time_work = $html_str->find('#shop_content_column .contents_child .top_shop_detail p br')[1]->text();
        $tel = trim($html_str->find('#shop_content_column .contents_child .top_shop_detail p')[3]->innertext());
        $crawl = new CrawlHelper();
        $store_data = $crawl->getStoreByDistance($address,$this->SuperMarketService);
        if(count($store_data) > 0){
            $data = [
                'business_hour'=>'',
                'tel'=>preg_replace('/[^0-9]/', '', $tel),
            ];
            $this->SuperMarketService->updateOrCreate(['id'=>$store_data['id']],$data);
        }
    }

    function parseLink($href){
        $crawl = new CrawlHelper();
        $html = $crawl->crawlUrl($href, 'GET',[],['charset-origin' => 'shift_jis']);
        return $html;
    }
}
