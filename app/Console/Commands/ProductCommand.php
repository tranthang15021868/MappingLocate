<?php

namespace App\Console\Commands;

use App\Services\ListLinkProductService;
use App\Services\ProductService;
use Helpers\CrawlHelper;
use Illuminate\Console\Command;
use Sunra\PhpSimple\HtmlDomParser;
ini_set('max_execution_time', 0);
class ProductCommand extends Command
{
    protected $ProductService;
    protected $ListLinkProductService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:product';

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
    public function __construct(ProductService $ProductService,ListLinkProductService $ListLinkProductService)
    {
        parent::__construct();
        $this->ProductService =  $ProductService;
        $this->ListLinkProductService =  $ListLinkProductService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->getLinkProduct();
    }

    public function getLinkProduct()
    {
        foreach ($this->arrayCategoryLink() as $val) {
            for($i = 1 ;$i < 20; $i++){
                $paginate = '/p'.$i.'/li.html';
                if($i == 1){
                    $href = $val;
                }else{
                    $href = str_replace('/li.html',$paginate,$val);
                }
                $link = 'https://www.soukai.com'.$href;
                $html_str = $this->parseLink($link);
                if(isset($html_str->find('#mainContents #infoArea .mb6 em  ul li')[0]) && $html_str->find('#mainContents #infoArea .mb6 em  ul li')[0]->innertext() == "ご指定の条件に一致する商品はありませんでした。"){
                    break;
                }else{
                    $product = $html_str->find('#mainContents .unitTypeB01 .itemTypeC01 .columnImageTypeB01');
                    foreach ($product as $key_p=>$value){
                        $link_product = $value->find('p.image a')[0]->getAttribute('href');
                        $this->saveProduct($link_product);
                    };
                }
            }
            sleep(3);
        }
        return true;
    }

    function parseLink($href){
        $crawl = new CrawlHelper();
        $html = $crawl->crawlUrl($href, 'GET',[],['charset-origin' => 'shift_jis']);
        return $html;
    }

    function saveProduct($href){
        $detail_typeE1 = null;
        $detail_typeE2 = null;
        $detail_typeE3 = null;
        $detail_typeF1 = null;
        $detail_typeF2 = null;
        $detail_typeF3 = null;
        $category3= null;
        $sub_img_product = null;

        $link_href = 'https://www.soukai.com'.$href;
        $arr_str = array('/','p.html');
        $product_id = str_replace($arr_str,'',$href);

        $html_str = $this->parseLink($link_href);
        $html_str = HtmlDomParser::str_get_html($html_str);

        $category1 = $html_str->find('.breadcrumbTypeA01 li')[1]->find('a span')[0]->innertext();
        $category2 = $html_str->find('.breadcrumbTypeA01 li')[2]->find('a span')[0]->innertext();
        if(isset($html_str->find('.breadcrumbTypeA01 li')[3]->find('a span')[0])){
            $category3 = $html_str->find('.breadcrumbTypeA01 li')[3]->find('a span')[0]->innertext();
        }

        $name = $html_str->find('.pageTitleTypeA02')[0]->innertext();
        $sub_name = $html_str->find('.info h3.ttl01')[0]->innertext();
        $img_product = $html_str->find('#productBasicInfoArea #view p a img')[0]->getAttribute('src');
        if(isset($html_str->find('#productDetailArea #productExplain .alignC img')[0])){
            $sub_img_product = $html_str->find('#productDetailArea #productExplain .alignC img')[0]->getAttribute('src');
        }

        $price_notax = $html_str->find('.info span[itemprop="price] .inner01')[0]->innertext();
        $price = $html_str->find('.info span[itemprop="price]')[0]->nodes[1]->innertext();
        $producer = $html_str->find('.info .org a')[0]->innertext();
        $contact_information = $html_str->find('#productDetailArea #contactInfoArea .innerTypeA01')[0]->innertext();
        $product_code = $html_str->find('#productDetailArea #janArea p')[0]->innertext();

        if(isset($html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[0])){
            $detail_typeE1 = $html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[0]->innertext();
        }
        if(isset($html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[1])){
            $detail_typeE2 = $html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[1]->innertext();
        }
        if(isset($html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[2])){
            $detail_typeE3 = $html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeE01')[2]->innertext();
        }
        if(isset($html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeF01')[0])) {
            $detail_typeF1 = $html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeF01')[0]->innertext();
        }
        if(isset($html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeF01')[1])){
            $detail_typeF2 = $html_str->find('#productDetailArea #productExplain')[0]->find('.unitTypeF01')[1]->innertext();
        }

        $data = [
            'product_id'=>$product_id,
            'category1'=>$category1,
            'category2'=>$category2,
            'category3'=>$category3,
            'name'=>$name,
            'sub_name'=>$sub_name,
            'img_product'=>$img_product,
            'sub_img_product'=>$sub_img_product,
            'price_notax'=>$price_notax,
            'price'=>$price,
            'producer'=>$producer,
            'contact_information'=>$contact_information,
            'product_code'=>$product_code,
            'detail_typeE1'=>$detail_typeE1,
            'detail_typeE2'=>$detail_typeE2,
            'detail_typeE3'=>$detail_typeE3,
            'detail_typeF1'=>$detail_typeF1,
            'detail_typeF2'=>$detail_typeF2,
        ];
        $condition = ['product_id'=>$product_id];
        $this->ProductService->updateOrCreate($condition,$data);
    }

    function arrayCategoryLink(){
        $link = 'https://www.soukai.com';
        $html_str = $this->parseLink($link);
        $link = $html_str->find('#document #gheader #topHeaderMenuArea .megaMenuBox .categories ul.subCategories li.subCatPane ');
        foreach ($link as $key => $val) {
            if($val->getAttribute('id') == 'subCatPaneG05' || $val->getAttribute('id') == 'subCatPaneG15'){
                foreach ($val->find('.subCatPaneInner .subCatList li') as $key_2=>$val2){
                    if($key_2 > 0){
                        $href = $val2->find("a")[0]->getAttribute('href');
                        $array_category_link[] = $href;
                    }
                }
            }
        }
        return $array_category_link;
    }
}
