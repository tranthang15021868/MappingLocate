<?php

namespace Helpers;

use App\Models\Categories;
use App\Services\IconTagsService;
use App\Services\PostBoxesService;
use App\Services\TagsService;
use App\Services\UtilitiesService;
use simplehtmldom_1_5\simple_html_dom;

/**
 * Created by PhpStorm.
 * User: khuongtd
 * Date: 9/21/16
 * Time: 11:23 AM
 */
class PostBoxesHelper
{
    protected $baseUrl = 'https://www.postmap.org';
    protected $post_box;
    protected $tag_service;
    protected $icon_tags_service;
    protected $utility_service;

    /**
     * TimeHelper constructor.
     *
     */
    public function __construct() {
        $this->post_box = new PostBoxesService();
        $this->tag_service = new TagsService();
        $this->icon_tags_service = new IconTagsService();
        $this->utility_service = new UtilitiesService();
    }

    public function crawl() {
        try {
            $listIconTags = $this->getListIconTags();
            $dom = CrawlHelper::crawlUrl($this->baseUrl . '/ajax?type=map%7Cside&opt=1&nocache=1528352626422', 'GET');
            $paginate = $this->getPaginate($dom);
            for ($i = 1; $i <= $paginate; $i++) {
                if ($i != 1)
                    $dom = CrawlHelper::crawlUrl($this->baseUrl . '/ajax?type=map%7Cside&opt=' . $i . '&nocache=1528352626422', 'GET');
                foreach ($dom->find('.li') as $key => $value) {
                    $attrName = $value->find('a')[0];
                    $name = $attrName->innertext();
                    $href = $attrName->href;
                    $postId = @explode('/', $href)[2];

                    if ($postBox = $this->post_box->findItemBy(['post_id' => $postId])) continue;

                    //get lat/long
                    $lat = $long = null;
                    $preview = CrawlHelper::request($this->baseUrl . '/ajax?type=map%7Ciw&id=' . $postId . '&nocache=1529636909203', 'GET', [], true);
                    if ($preview) {
                        $lat = $preview->lat;
                        $long = $preview->lng;
                    }

                    $class = $value->find('.icon')[0]->getAttribute('class');
                    $class = explode(' ', $class);
                    $iconTags = str_replace('icon_', '', @$class[2]);
                    $icon_tags_id = null;
                    if (isset($listIconTags[$iconTags])) {
                        $icon_tags_id = $listIconTags[$iconTags]->id;
                    }
                    $address = $value->find('.rel')[0]->innertext();

                    $tags = [];
                    foreach ($value->find('.tag a') as $k => $v) {
                        $tag = strip_tags($v->innertext());
                        if ($tag) $tags[] = $this->tag_service->updateOrCreate(['name' => $tag], [
                            'name' => $tag,
                            'tag_name' => $tag
                        ])->id;
                    }
                    $detailDom = CrawlHelper::crawlUrl($this->baseUrl . $href);
                    $pNum = $detailDom->find('#pnum' . $postId);
                    $code = null; $collectionBranch = null;
                    if ($pNum) {
                        $pNum = str_replace(' ', '', @$detailDom->find('#pnum' . $postId)[0]->innertext());
                        $pNum = explode('|', @$pNum);
                        foreach ($pNum as $k => $v) {
                            if (strpos($v, '取集支店') === 0) $collectionBranch = @explode(':', $v)[1];
                            if (strpos($v, 'ポスト番号') === 0) $code = @explode(':', $v)[1];
                        }
                    }

                    $postTime = $this->getPostTime($detailDom, $postId);

                    $utility = $this->utility_service->create([
                        'name' => $name,
                        'workingtime_weekday' => @$postTime['weekday'],
                        'workingtime_saturday' => @$postTime['saturday'],
                        'workingtime_holiday' => @$postTime['holiday'],
                        'workingtime_before_holiday' => @$postTime['before_holiday'],
                        'lat' => $lat,
                        'long' => $long,
                        'address' => $address,
                        'icon_tags_id' => $icon_tags_id,
                        'created_by' => 1,
                        'type' => Categories::TYPE_POSTBOX
                    ]);

                    $postBox = $this->post_box->create([
                        'post_id' => $postId,
                        'code' => $code,
                        'utilities_id' => $utility->id,
                        'collection_branch' => $collectionBranch
                    ]);

                    $listImages = [];
                    foreach ($detailDom->find('#images' . $postId . ' img') as $k => $v) {
                        $listImages[] = [
                            'url' => str_replace('-resize-240-120', '', $v->src),
                            'utilities_id' => $utility->id,
                        ];
                    }

                    $comments = [];
                    foreach ($detailDom->find('#comment .comment .body') as $k => $v) {
                        $comments[] = [
                            'utilities_id' => $utility->id,
                            'content' => $v->innertext()
                        ];
                    }

                    if ($listImages) $postBox->images()->createMany($listImages);
                    if ($comments) $postBox->comments()->createMany($comments);
                    if ($tags) $postBox->tags()->sync($tags);
                }
                sleep(3);
            }
        } catch (\Exception $e) {
            \Log::info('Line ' . $e->getLine() . ': ' . $e->getMessage());
        }
    }

    /**
     * @param simple_html_dom $detailDom
     * @param string $postId
     * @return array
     */
    protected function getPostTime($detailDom = null, $postId = '') {
        $postTime = [];
        foreach ($detailDom->find('#posttime' . $postId . ' table tbody tr th') as $k => $v) {
            $type = $v->innertext();
            if ($type == '平日') {
                $postTime[] = ['type' => 'weekday'];
            } else if ($type == '土曜') {
                $postTime[] = ['type' => 'saturday'];
            } else if ($type == '休日') {
                $postTime[] = ['type' => 'holiday'];
            } else {
                $postTime[] = ['type' => 'before_holiday'];
            }
        }
        $countPostTime = count($postTime);
        foreach ($detailDom->find('#posttime' . $postId . ' table tbody tr') as $k => $v) {
            if ($k == 0) continue;
            for ($i = 0; $i <= $countPostTime; $i++) {
                $v->children($i) ? $postTime[$i]['data'][] = $v->children($i)->innertext() : null;
            }
        };
        foreach ($postTime as $k => $value) {
            if ($value['type'] == 'weekday') {
                $postTime['weekday'] = json_encode($value['data']);
            } else if ($value['type'] == 'saturday') {
                $postTime['saturday'] = json_encode($value['data']);
            } else if ($value['type'] == 'holiday') {
                $postTime['holiday'] = json_encode($value['data']);
            } else {
                $postTime['before_holiday'] = json_encode($value['data']);
            }
        }
        return $postTime;
    }

    protected function getListIconTags() {
        \DB::beginTransaction();
        $listTags = [];
        $dom = CrawlHelper::crawlUrl($this->baseUrl . '/map', 'GET');
        foreach ($dom->find('#iconSlt option') as $key => $value) {
            $name = $value->innertext();
            $tagName = $value->value;
            if ($tagName == '') $tagName = $name;
            $array = [
                'name' => $name,
                'tag_name' => $tagName
            ];
            $iconTag = $this->icon_tags_service->updateOrCreate(['name' => $name], $array);
            $listTags[$tagName] = $iconTag;
        }
        \DB::commit();
        return $listTags;

    }

    protected function getPaginate($dom) {
        return round((int)filter_var($dom->find('.total')[0]->outertext(), FILTER_SANITIZE_NUMBER_INT) / 30);
    }
}