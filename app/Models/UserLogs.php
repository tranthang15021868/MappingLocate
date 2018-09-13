<?php

namespace App\Models;

class UserLogs extends BaseModel
{
    protected $table = 'user_logs';
    public $fillable = ['search_key', 'lat', 'long', 'user_id', 'language_id', 'created_at', 'updated_at'];
}
