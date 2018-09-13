<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends BaseModel
{
    protected $connection = 'mysql';
    protected $table = 'cities';
    public $timestamps = true;
    protected $guarded = [];
}
