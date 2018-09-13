<?php

namespace Helpers;

use App\Models\Categories;
use App\Services\CommentsService;
use App\Services\TagsService;
use App\Services\UtilitiesService;
use App\Services\UtilitiesTagsService;
use App\Services\VendingMachinesService;
use Illuminate\Support\Facades\Log;


/**
 * Created by PhpStorm.
 * User: khuongtd
 * Date: 9/21/16
 * Time: 11:23 AM
 */
class VendingMachineHelper
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
            $id = $name = $address = $map = $lat = $lng = $city = $town = '';
            $crawlData = new CrawlHelper();
            for ($page = 1; $page <= $this->__getPanigate(); $page++) {
                $utilities = array();
                $html = $crawlData->crawlUrl('http://jihan.30maps.com/list?p=' . $page);
                foreach ($html->find('.listTbl tr') as $i => $item) {
                    if (!$i) continue;
                    if ($i % 3 == 1) {
                        $id = substr($item->find('a')[0]->href, 5);
                        $this->__saveComment($id);
                        $utilities['name'] = $item->find('a')[0]->innertext;
                        $code = explode(",", $item->find('code')[0]->onclick);
                        $utilities['lat'] = $code[2];
                        $utilities['long'] = $code[3];
                    }
                    if ($i % 3 == 2) {
                        $itemContent = $item->find('a');
                        $itemNumber = count($itemContent);
                        if ($itemNumber > 1) {
                            $utilities['address'] = $itemContent[0]->innertext . " " . $itemContent[1]->innertext;
                        }
                    }
                    if (!($i % 3)) {
                        $this->__saveTag($item, $id);
                    }
                    $utilities['type'] = Categories::TYPE_VENDING_MACHINE;
                    $utilitiesId = $this->__saveUtilities(UtilitiesService::class, $utilities);
                    if (!$this->__save(['utilities_id' => $utilitiesId, 'machine_code' => $id], VendingMachinesService::class, $id))
                        $this->__delete(UtilitiesService::class, $utilitiesId);
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::info('Line ' . $e->getLine() . ': ' . $e->getMessage());
        }
    }
    private function __delete($table,$id){
        $model=new $table;
        $model->delete($id);
    }
    private function __saveUtilities($table, $arr)
    {
        return $this->__save($arr, $table);
    }

    private function __saveTag($item, $id)
    {
        foreach ($item->find('div a') as $itema) {
            $name = $itema->innertext;
            $arr = array('name' => $name, 'tag_name' => $name);
            if (!($tag_id = $this->__find($arr, TagsService::class))) {
                $tag_id = $this->__save($arr, TagsService::class);
            }
            $arr = array('tag_id' => $id, 'utilities_id' => $tag_id);
            $this->__save($arr, UtilitiesTagsService::class);
        }
    }

    private function __saveComment($id)
    {
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl("http://jihan.30maps.com/map/$id");
        foreach ($html->find('.comment .body') as $element) {
            $content = $element->innertext;
            $arr = array('utilities_id' => $id, 'content' => $content);
            $this->__save($arr, CommentsService::class);
        }
    }

    private function __save($arr, $table, $id = 0)
    {
        $model = new $table();
        if (!$id) return $model->create($arr)->id;
        $arr1['machine_code'] = $id;
        if (!($model->findItemBy($arr1))) {
            return $model->create($arr)->id;
        }else{
            return 0;
        }
    }

    private function __find($arr, $table)
    {
        $model = new $table();
        $id = $model->findItemBy($arr) ? $model->findItemBy($arr)->id : 0;
        return $id;
    }

    private function __getPanigate()
    {
        $crawlData = new CrawlHelper();
        $html = $crawlData->crawlUrl('http://jihan.30maps.com/list?p=1');
        $p = $html->find('.pager a');
        $pn = count($p);
        $pt = $p[$pn - 2]->innertext;
        return $pt;
    }
}