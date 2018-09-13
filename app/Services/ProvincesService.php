<?php
namespace App\Services;

use App\Models\Provinces;

class ProvincesService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Provinces::class;
    }

}
