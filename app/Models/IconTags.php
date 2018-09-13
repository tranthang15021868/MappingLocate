<?php

namespace App\Models;

class IconTags extends BaseModel
{
    protected $table = 'icon_tags';
    public $fillable = ['tag_name', 'name', 'created_at', 'updated_at'];
}
