<?php

namespace Helpers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Sunra\PhpSimple\HtmlDomParser;

/**
 * Created by PhpStorm.
 * User: khuongtd
 * Date: 9/21/16
 * Time: 11:23 AM
 */
class CrawlHelper
{
    /**
     * TimeHelper constructor.
     */
    public function __construct()
    {
    }

    //khuongtd
    /**
     * crawl from url
     *
     * @param string $url
     * @param string $method
     * @param array $input
     * @param array $params
     * @return \simplehtmldom_1_5\simple_html_dom
     */
    public static function crawlUrl ($url = '', $method = 'GET', $input = [], $params = []) {
        $response = self::request($url, $method, $input, false, $params);
        $charsetTarget = @$params['charset-target'] ? $params['charset-target'] : 'UTF-8';
        $charsetOrigin = @$params['charset-origin'] ? $params['charset-origin'] : 'UTF-8';
        return HtmlDomParser::str_get_html(mb_convert_encoding($response, $charsetTarget, $charsetOrigin));
    }

    /**
     * call api
     *
     * @param string $url
     * @param string $method
     * @param array $input
     * @param bool $returnJson
     * @param array $params
     * @return mixed|\Psr\Http\Message\StreamInterface
     */
    public static function request ($url = '', $method = 'GET', $input = [], $returnJson = false, $params = []) {
        $client = new Client([
            'verify' => false
        ]);

        $res = $client->request($method, $url, $input);
        if (!$returnJson) return $res->getBody();
        return json_decode($res->getBody());
    }
    //end khuongtd

    //annh

    //end andnh

    //cuonglm
    public static function getStoreByDistance($address,$StoreService){
        try{
            $id = null;
            $array_check_local = [
                0 => "locality",
                1 => "political",
            ];
            $arr_met = array();

            $Url = 'http://maps.google.com/maps/api/geocode/json?address='.urlencode ($address);
            $client = new Client([
                'verify' => false
            ]);
            $res = $client->request('GET', $Url);
            $res->getStatusCode();

            if($res->getStatusCode() == 200){
                $data = json_decode($res->getBody(),true);
                foreach ($data['results'][0]['address_components'] as $key=>$val){
                    if($val['types'] == $array_check_local){
                        $ward = $data['results'][0]['address_components'][$key]['long_name'];
                        $ward_replace = preg_replace('/-.*/', '', $ward);
                    }
                }
                $long =  $data['results'][0]['geometry']['location']['lng'];
                $lat =  $data['results'][0]['geometry']['location']['lat'];
                $select_ward = $StoreService->searchByArea($ward_replace);
                foreach ($select_ward as $key=>$value){
                    $latitude1 = $value['lat'];
                    $longitude1 = $value['lng'];
                    $latitude2 = $lat;
                    $longitude2 = $long;
                    $theta = $longitude1 - $longitude2;
                    $miles = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
                    $miles = acos($miles);
                    $miles = rad2deg($miles);
                    $miles = $miles * 60 * 1.1515;
                    $kilometers = $miles * 1.609344;
                    $meters = $kilometers * 1000;

                    if($meters <= 200){
                       $arr_met[$key]['meters'] = $meters;
                       $arr_met[$key]['id'] = $value['id'];
                       $arr_met[$key]['lat'] = $lat;
                       $arr_met[$key]['lng'] = $long;
                    }
                }

                if(count($arr_met) > 0){
                    $key = array_search(min($arr_met), $arr_met);
                     return $arr_met = $arr_met[$key];
                }

                return $arr_met;
            }
        }catch(\Exception $e){
            Log::error('getStoreByDistance_error'.$e->getMessage());
        }

    }
    //endcuonglm
}