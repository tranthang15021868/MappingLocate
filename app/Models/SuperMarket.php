<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperMarket extends BaseModel
{
    protected $connection = 'mysql';
    protected $table = 'supermarket';
    protected $filltable = ['store_id', 'utilities_id', 'area_id', 'group_id', 'nearest_station', 'store_type', 'lat', 'long', 'tel', 'business_hour', 'city_id'];
    public $timestamps = true;
    protected $guarded = [];

    public function services() {
    	$supermarketService = new SupermarketService();
    	return $this->belongsToMany(Service::class, $relatedTable->getTable(), 'supermarket_id', 'service_id');
    }

    public function supermarketService() {
    	return $this -> hasMany(SupermarketService::class, 'supermarket_id', 'id');
    }

    public function cates() {
        $relatedTable = new UtilitiesCate();
        return $this -> belongsToMany(Categories::class, $relatedTable -> getTable(), 'utilities_id', 'category_id');
    }
}
