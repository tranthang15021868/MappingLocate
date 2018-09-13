<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\UtilitiesService;
use App\Models\Utilities;


use JWTAuth;
use Helpers\Api;

class UtilitiesController extends Controller
{

    protected $user;

    protected $utility;

    /**
     * UtilitiesController constructor.
     * @param UtilitiesService $utilitiesService
     */
    public function __construct(UtilitiesService $utilitiesService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->utility = $utilitiesService;
    }

    /**
     * Get Utilities around selected location less than 1km
     * @param  [String] $lat
     * @param  [String] $long
     * @return [Json Array]
     */
    public function getUtiilities($lat, $long)
    {
        $result = $this->utility->getUtilities($lat, $long);
        if ($result != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * search Utilities With Location
     * @param  [String] $lat
     * @param  [String] $long
     * @param  [Int] $cate
     * @return [Json Array]
     */
    public function searchUtilitiesWithLocation($lat, $long, $cate)
    {
        $result = $this->utility->getUtilitiesWithLocation($lat, $long, $cate);
        if ($result != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * search Utilities In City's device
     * @param  [String] $city City of device
     * @param  [Int] $cate category's ID
     * @param  [String] $lang Device's Language
     * @return [Json Array]
     */
    public function searchUtilitiesInCity($city, $cate, $lang, $lat, $long, $device_code)
    {
        $result = $this->utility->getUtilitiesInCity($city, $cate, $lang, $lat, $long, $device_code);
        if ($result != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * [deleteUtility description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteUtility($id)
    {
        if ($this->utility->deleteUT($id)) {
            return Api::r_response("", 'Delete success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }
}
