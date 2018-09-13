<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilitiesCate extends Model
{
    protected $table = 'utilities_cates';
    public $timestamps = true;
    public $fillable = ['utilities_id', 'category_id'];
}
