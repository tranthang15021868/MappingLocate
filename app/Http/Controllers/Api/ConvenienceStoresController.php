<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\ConveniencesStoreService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;

class ConvenienceStoresController extends Controller
{
    protected $user;

    protected $convenienceStore;

    /**
     * ConvenienceStoresController constructor.
     * @param ConveniencesStoreService $conveniencesStoreService
     */
    public function __construct(ConveniencesStoreService $conveniencesStoreService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->convenienceStore = $conveniencesStoreService;
    }

    /**
     * Get Detail ConvenienceStore
     * @param  [Int] $id ID of ConvenienceStore
     * @return [Json]
     */
    public function getDetailConvenienceStore($id)
    {
        $result = $this->convenienceStore->findCS($id);
        if ($result['convenienceStores'] != "") {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * Create New ConveninceStore
     * @param  Request $request
     * @return [Json]
     */
    public function createNewConveninceStore(Request $request)
    {

        $result = $this->convenienceStore->createConveninceStore($request->except(['token']));

        if ($result) {
            return Api::r_response($result, 'Create success!', 'S200');
        } else {
            return Api::r_response("", 'Server error', 'E500');
        }
    }

    /**
     * edit ConveninceStore
     * @param  Request $request
     * @param  [int]  $id
     * @return [status of action]
     */
    public function editConveninceStore(Request $request, $id)
    {

        $result = $this->convenienceStore->edit($id, $request->except(['token']));
        if ($result) {
            return Api::r_response("", 'Edit success!', 'S200');
        } else {
            return Api::r_response("", 'Server Error!', 'E500');
        }
    }
}
