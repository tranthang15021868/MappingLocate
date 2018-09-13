<?php

namespace App\Services;

use App\Models\Languages;

class LanguagesService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Languages::class;
    }

}
