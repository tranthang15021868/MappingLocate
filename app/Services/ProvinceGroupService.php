<?php
namespace App\Services;

use App\Models\ProvinceGroup;

class ProvinceGroupService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return ProvinceGroup::class;
    }

}
