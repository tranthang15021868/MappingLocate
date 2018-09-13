<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Helpers\PostBoxesHelper;

class PostBoxesController extends Controller
{
    protected $test;

    public function __construct(TestService $testService) {
        $this->test = $testService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $helper = new PostBoxesHelper();
        $helper->crawl();

    }



//    protected function

    public function show($id) {
        $str = 'ポスト番号:138|取集支店:豊平';
        $a = strpos($str, '取集支店');
        dd($a);
        preg_match('/^ポスト番号+/', 'ポスト番号:138|取集支店:豊平', $from);
        dd($from);
        $a = explode(':', 'ポスト番号:138|取集支店:豊平');
        print_r($a);
        dd(explode(':', $a[0]));
    }
}
