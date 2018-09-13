<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvenienceStoresServices extends Model
{
    protected $table = 'convenience_stores_services';

    protected $fillable = ['convenience_stores_id', 'service_id'];
    
    public $timestamps = false;

}
