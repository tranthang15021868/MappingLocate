<?php

namespace App\Http\Controllers\Api;

use App\Services\TestService;
use App\Services\UsersLogService;
use Helpers\Api;
use Helpers\PostBoxesHelper;
use App\Models\Categories;
class TestController extends BaseApiController
{
    protected $test;
    protected $ul;

    public function __construct(TestService $testService, UsersLogService $userlg) {
        $this->test = $testService;
        $this -> ul = $userlg;
    }

    public function index() {
        return Api::r_response([$this -> ul -> getModel()], 'This is message!', 'S001');
    }

    public function getAllCate($id) {
    	$cate = Categories::findOrFail($id);
    	return response() -> json($cate);
    }

    public function he() {
        return '[{"id":"50","name":"Viettel ","price":"50","url_image":"http:\/\/150.95.105.175\/Hotel\/uploads\/49.jpeg"},{"id":"51","name":"Vinaphone ","price":"50","url_image":"http:\/\/150.95.105.175\/Hotel\/uploads\/51.jpeg"},{"id":"54","name":"Mobifone","price":"50","url_image":"http:\/\/150.95.105.175\/Hotel\/uploads\/52.jpeg"}]';
    }
}