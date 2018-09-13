<?php

namespace App\Services;

use App\Models\Users;

class UsersService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Users::class;
    }

}
