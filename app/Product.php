<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mysql';
    protected $table = 'product';
    public $timestamps = true;
    protected $guarded = [];
}