<?php

namespace App\Services;

use App\Models\Tags;

class TagsService extends BaseService
{
    public function getModel() {
        return Tags::class;
    }
}