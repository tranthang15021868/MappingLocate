<?php

namespace App\Services;

use App\Models\Groups;

class GroupsService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Groups::class;
    }

}
