<?php

namespace App\Models;

class ConvenienceStores extends BaseModel
{
    protected $guarded = [];

    public function images() {
        return $this->hasMany(Images::class, 'utilities_id', 'utilities_id');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'utilities_id', 'utilities_id');
    }

    public function tags() {
        $relatedTable = new UtilitiesTags();
        return $this->belongsToMany(Tags::class, $relatedTable->getTable(), 'utilities_id', 'tag_id');
    }

    public function cates() {
        $relatedTable = new UtilitiesCate();
        return $this -> belongsToMany(Categories::class, $relatedTable -> getTable(), 'utilities_id', 'category_id');
    }

    public function services() {
        $convenienceStoresServices = new ConvenienceStoresServices();
        return $this->belongsToMany(Service::class, $relatedTable->getTable(), 'convenience_stores_id', 'service_id');
    }

    public function convenienceStoreService() {
        return $this -> hasMany(ConvenienceStoresServices::class, 'convenience_stores_id', 'id');
    }
}
