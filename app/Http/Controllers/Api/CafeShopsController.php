<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\CafeShopsService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;

class CafeShopsController extends Controller
{
    protected $user;

    protected $cafeShop;

    /**
     * CafeShopsController constructor.
     * @param CafeShopsService $cafeShopsService
     */
    public function __construct(CafeShopsService $cafeShopsService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->cafeShop = $cafeShopsService;
    }

    /**
     * get Detail CafeShop
     * @param  [Int] $id
     * @return [Json]
     */
    public function getDetailCafeShop($id)
    {
        $result = $this->cafeShop->findCF($id);
        if ($result['cafeShop'] != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * Create New CafeShop
     * @param  Request $request
     * @return [Json]
     */
    public function createNewCafeShop(Request $request)
    {

        $result = $this->cafeShop->createCafeShop($request->except(['token']));

        if ($result) {
            return Api::r_response($result, 'Create success!', 'S200');
        } else {
            return Api::r_response("", 'Server error', 'E500');
        }
    }

    /**
     * edit CafeShop
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function editCafeShop(Request $request, $id)
    {

        $result = $this->cafeShop->edit($id, $request->except(['token']));

        if ($result) {
            return Api::r_response("", 'Edit success!', 'S200');
        } else {
            return Api::r_response("", 'Server Error!', 'E500');
        }
    }
}
