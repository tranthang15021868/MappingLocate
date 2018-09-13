<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupermarketService extends BaseModel
{
    protected $table = 'supermarket_services';

    protected $fillable = ['supermarket_id', 'service_id'];
    
    public $timestamps = false;
}
