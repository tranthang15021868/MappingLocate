<?php

namespace App\Services;

use App\Models\Areas;

class AreasService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Areas::class;
    }
}