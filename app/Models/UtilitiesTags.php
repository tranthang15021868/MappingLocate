<?php

namespace App\Models;

class UtilitiesTags extends BaseModel
{
    protected $table = 'utilities_tags';
    public $timestamps = false;
    public $fillable = ['tag_id', 'utilities_id'];
}
