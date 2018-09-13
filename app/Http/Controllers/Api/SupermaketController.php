<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\SuperMarketService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;

class SupermaketController extends Controller
{
    protected $user;

    protected $superMarket;

    /**
     * SupermaketController constructor.
     * @param SuperMarketService $superMarketService
     */
    public function __construct(SuperMarketService $superMarketService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->superMarket = $superMarketService;
    }

    /**
     * get Detail Supermarket
     * @param  [Int] $id
     * @return [Json]
     */
    public function getDetailSupermarket($id)
    {
        $result = $this->superMarket->findSM($id);
        if ($result['supermarket'] != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * Create New Supermarket
     * @param  Request $request
     * @return [Json]
     */
    public function createNewSupermarket(Request $request)
    {
        $result = $this->superMarket->createSupermarket($request->except(['token']));

        if ($result) {
            return Api::r_response($result, 'Create success!', 'S200');
        } else {
            return Api::r_response("", 'Server error', 'E500');
        }
    }

    /**
     * edit Supermarket
     * @param  Request $request
     * @param  [Int]  $id
     * @return [json]
     */
    public function editSupermarket(Request $request, $id)
    {
        $result = $this->superMarket->edit($id, $request->except(['token']));

        if ($result) {
            return Api::r_response("", 'Edit success!', 'S200');
        } else {
            return Api::r_response("", 'Server Error!', 'E500');
        }
    }
}
