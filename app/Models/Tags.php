<?php

namespace App\Models;

class Tags extends BaseModel
{
    public $fillable = ['url', 'tag_name', 'name', 'created_at', 'updated_at'];
}
