<?php

namespace App\Models;

class Images extends BaseModel
{
    protected $table = 'images';
    public $fillable = ['url', 'utilities_id', 'created_at', 'updated_at'];
}
