<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\VendingMachinesService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;
use File;
use DB;

class VendingMachineController extends Controller
{
    /**
     * [$user description]
     * @var [type]
     */
    protected $user;

    /**
     * [$vendingMachine description]
     * @var [type]
     */
    protected $vendingMachine;

    /**
     * @param VendingMachinesService
     */
    public function __construct(VendingMachinesService $vendingMachinesService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->vendingMachine = $vendingMachinesService;
    }

    /**
     * [getDetailVendingMachine description]
     * @param  [Int] $id id of Vending Machine
     * @return [Json]
     */
    public function getDetailVendingMachine($id)
    {
        $result = $this->vendingMachine->findVM($id);
        if ($result != null) {
            return Api::r_response($result, 'Get success', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * Create VendingMachine
     * @param  Request
     * @return [Json]
     */
    public function createNewVendingMachine(Request $request)
    {
        $result = $this->vendingMachine->createVendingMachine($request->except(['token']));

        if ($result) {
            return Api::r_response($result, 'Create success!', 'S200');
        } else {
            return Api::r_response("", 'Server error', 'E500');
        }
    }

    /**
     * editVendingMachine
     * @param  Request $request
     * @param  [Int]  $id      id of Vending Machine
     * @return [Object]   Vending Machine
     */
    public function editVendingMachine(Request $request, $id)
    {
        $result = $this->vendingMachine->edit($id, $request->except(['token']));
        if ($result) {
            return Api::r_response("", 'Edit success!', 'S200');
        } else {
            return Api::r_response("", 'Server Error!', 'E500');
        }
    }
}
