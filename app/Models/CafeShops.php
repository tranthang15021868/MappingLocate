<?php

namespace App\Models;

class CafeShops extends BaseModel
{
    protected $table = 'cafe_shops';
    public $fillable = ['phone', 'website', 'utilities_id', 'created_at', 'updated_at'];

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
}
