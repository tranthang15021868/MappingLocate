<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $connection = 'mysql';
    protected $table = 'group';
    public $timestamps = true;
    protected $guarded = [];
}
