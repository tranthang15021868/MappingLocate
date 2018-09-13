<?php

namespace App\Services;

use App\Models\IconTags;

class IconTagsService extends BaseService
{
    public function getModel() {
        return IconTags::class;
    }
}