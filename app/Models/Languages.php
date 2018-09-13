<?php

namespace App\Models;

class Languages extends BaseModel
{
    protected $table = 'languages';
    public $fillable = ['name', 'slug', 'created_at', 'updated_at'];
}
