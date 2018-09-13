<?php

namespace App\Models;

class Comments extends BaseModel
{
    protected $table = 'comments';
    public $fillable = ['utilities_id', 'content', 'created_at', 'updated_at'];
}
