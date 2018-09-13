<?php

namespace App\Services;

use App\Models\Cities;

class CitiesService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Cities::class;
    }

}
