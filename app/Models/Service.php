<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    protected $table = 'services';

    protected $filltable = ['slug', 'name', 'icon_url'];

    public $timestamps = true;
}
