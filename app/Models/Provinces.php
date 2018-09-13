<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinces extends BaseModel
{
    protected $connection = 'mysql';
    protected $table = 'provinces';
    public $timestamps = true;
    protected $guarded = [];

    public function groups() {
        return $this->belongsToMany('App\Models\Groups', 'province_group', 'province_id', 'group_id');
    }
}
