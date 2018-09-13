<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceGroup extends Model
{
    protected $connection = 'mysql';
    protected $table = 'province_group';
    public $timestamps = true;
    protected $guarded = [];

}
