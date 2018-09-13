<?php

namespace App\Models;

class Users extends BaseModel
{
    protected $table = 'users';
    public $fillable = ['id', 'username', 'device_code', 'created_at', 'updated_at'];
}
