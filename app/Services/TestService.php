<?php

namespace App\Services;

use App\Models\Test;

class TestService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Test::class;
    }

    public function test() {
        return $this->_model->first();
    }

    public function testApi() {
        return 'This is test!';
    }
}