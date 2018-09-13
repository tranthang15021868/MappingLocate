<?php

namespace App\Services;

use App\Models\UserLogs;

class UsersLogService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return UserLogs::class;
    }
}
