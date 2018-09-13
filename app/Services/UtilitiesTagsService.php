<?php

namespace App\Services;

use App\Models\UtilitiesTags;

class UtilitiesTagsService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return UtilitiesTags::class;
    }
}