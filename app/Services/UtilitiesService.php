<?php

namespace App\Services;

use App\Models\Utilities;
use Helpers\Api;
use DB;
use File;
use Stichoza\GoogleTranslate\TranslateClient;

class UtilitiesService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function getModel()
    {
        return Utilities::class;
    }


    /**
     * Get Utilities arround location selected less than 1km
     * @param  [String] $lat
     * @param  [String] $long
     * @return [json]
     */
    public function getUtilities($lat, $long)
    {
        $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->get();
        $result = array();
        $lat = (double)$lat;
        $long = (double)$long;
        for ($i = 0; $i < sizeof($utilities); $i++) {
            $latOfUT = (double)$utilities[$i]->lat;
            $longOfUT = (double)$utilities[$i]->long;

            if ($lat < 25) {
                if (abs($latOfUT - $lat) <= 0.004516 * 2 && abs($longOfUT - $long) <= 0.004814 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 25 && $lat < 32) {
                if (abs($latOfUT - $lat) <= 0.004510518 * 2 && abs($longOfUT - $long) <= 0.005182099 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 32 && $long < 35.75) {
                if (abs($latOfUT - $lat) <= 0.00450767 * 2 && abs($longOfUT - $long) <= 0.00543028 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 35.75 && $long < 38.75) {
                if (abs($latOfUT - $lat) <= 0.00450483 * 2 && abs($longOfUT - $long) <= 0.00570343 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 38.75 && $long < 42.5) {
                if (abs($latOfUT - $lat) <= 0.0045029 * 2 && abs($longOfUT - $long) <= 0.0059013 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else {
                if (abs($latOfUT - $lat) <= 0.00449915 * 2 && abs($longOfUT - $long) <= 0.00634139 * 2) {
                    array_push($result, $utilities[$i]);
                }
            }
        }
        return $result;
    }

    /**
     * @param $lat
     * @param $long
     * @param $cate
     * @return array
     */
    public function getUtilitiesWithLocation($lat, $long, $cate)
    {
        $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where('type', $cate)->get();
        $result = array();
        $lat = (double)$lat;
        $long = (double)$long;
        for ($i = 0; $i < sizeof($utilities); $i++) {
            $latOfUT = (double)$utilities[$i]->lat;
            $longOfUT = (double)$utilities[$i]->long;

            if ($lat < 25) {
                if (abs($latOfUT - $lat) <= 0.004516 * 2 && abs($longOfUT - $long) <= 0.004814 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 25 && $lat < 32) {
                if (abs($latOfUT - $lat) <= 0.004510518 * 2 && abs($longOfUT - $long) <= 0.005182099 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 32 && $long < 35.75) {
                if (abs($latOfUT - $lat) <= 0.00450767 * 2 && abs($longOfUT - $long) <= 0.00543028 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 35.75 && $long < 38.75) {
                if (abs($latOfUT - $lat) <= 0.00450483 * 2 && abs($longOfUT - $long) <= 0.00570343 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else if ($lat >= 38.75 && $long < 42.5) {
                if (abs($latOfUT - $lat) <= 0.0045029 * 2 && abs($longOfUT - $long) <= 0.0059013 * 2) {
                    array_push($result, $utilities[$i]);
                }
            } else {
                if (abs($latOfUT - $lat) <= 0.00449915 * 2 && abs($longOfUT - $long) <= 0.00634139 * 2) {
                    array_push($result, $utilities[$i]);
                }
            }

        }
        return $result;
    }

    /**
     * @param $city
     * @param $cate
     * @param $lang
     * @param $lat
     * @param $long
     * @param $device_code
     * @return mixed
     * @throws \Exception
     */
    public function getUtilitiesInCity($city, $cate, $lang, $lat, $long, $device_code)
    {
        $category = new CategoriesService();
        $search_key = "";
        if ($lang == 'ja') {
            $search_key = $category->find($cate)->name;
        } else if ($lang == 'vi') {
            $search_key = $category->find($cate)->name_vi;
        } else if ($lang == 'zh') {
            $search_key = $category->find($cate)->name_cn;
        } else if ($lang == 'es') {
            $search_key = $category->find($cate)->name_es;
        } else if ($lang == 'en') {
            $search_key = $category->find($cate)->name_en;
        } else {
            $search_key = $category->find($cate)->name_ko;
        }
        $tr = new TranslateClient();

        $this->saveUserInfo($lat, $long, $lang == "zh" ? $lang = "cn" : $lang, $search_key . "(" . $cate . ")", $device_code);
        if ($lang == "ja") {
            $city_tl = $tr->setTarget('ja')->translate($city);
            $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where([['address', 'LIKE', '%' . $city_tl . '%'], ['type', $cate]])->get();
        } else if ($lang == "ko") {
            $city_tl = $tr->setTarget('ko')->translate($city);
            $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where([['address_' . $lang, 'LIKE', '%' . $city_tl . '%'], ['type', $cate]])->get();
        } else if ($lang == "vi") {
            $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where([['address' . '_' . $lang, 'LIKE', '%' . $city . '%'], ['type', $cate]])->get();
        } else if ($lang == "zh") {
            $city_tl = $tr->setTarget('zh-CN')->translate($city);
            $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where([['address_cn', 'LIKE', '%' . $city_tl . '%'], ['type', $cate]])->get();
        } else {
            $city1 = $tr->setTarget('vi')->translate($city);
            $city_tl = $tr->setSource('vi')->setTarget('en')->translate($city);
            $utilities = Utilities::select('id', 'name', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'name_vi', 'name_en', 'name_cn', 'name_es', 'name_ko', 'lat', 'long', 'category_id', 'type')->where([['address' . '_' . $lang, 'LIKE', '%' . $city_tl . '%'], ['type', $cate]])->get();
        }
        return $utilities;
    }

    /**
     * [deleteUtility description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteUT($id)
    {
        $utility = $this->find($id);

        if ($utility) {

            // Delete all tag of Utility
            $utility->utilitiesCates()->delete();

            // Delete all images of Utility
            $images = $utility->images;
            if (sizeof($images) != 0) {
                foreach ($images as $image) {

                    $img_url = "public/upload/" . $image->url;
                    if (File::exists($img_url)) {
                        File::delete($img_url);
                    }
                }
                $utility->images()->delete();
            }

            // Delete comments;
            $utility->comments()->delete();

            // Vending Machine
            if ($utility->type == 1) {
                $vendingMachine = DB::table('vending_machines')->where('utilities_id', $id)->delete();
            } else if ($utility->type == 2) {
                $postboxes = DB::table('postboxes')->where('utilities_id', $id)->delete();
            } else if ($utility->type == 3) {
                $cafeShop = DB::table('cafe_shops')->where('utilities_id', $id)->delete();
            } else if ($utility->type == 4) {
                $convenienceStore = DB::table('convenience_stores')->where('utilities_id', $id)->delete();
            } else {
                $supermarket = DB::table('supermarkets')->where('utilities_id', $id)->first();
                $supermarketServices = DB::table('supermarket_services')->where('supermarket_id', $supermarket->id)->delete();
                $supermarket->delete();
            }

            $utility->delete();

            return true;
        } else {
            return false;
        }
    }

    /**
     * save User info
     * @param $lat
     * @param $long
     * @param $lang
     * @param $search_key
     * @param $device_code
     */
    public function saveUserInfo($lat, $long, $lang, $search_key, $device_code)
    {
        $user_lg = "";
        if ($search_key != null) {
            $user_log = new UsersLogService();
            $user = new UsersService();
            $language = new LanguagesService();

            $lang_id = $language->findCondition('slug', '=', $lang);
            $user_id = $user->findCondition('device_code', '=', $device_code);
            $user_lg = $user_log->create(['search_key' => $search_key, 'lat' => $lat, 'long' => $long, 'user_id' => $user_id['id'], 'language_id' => $lang_id['id']]);
        }
    }
}