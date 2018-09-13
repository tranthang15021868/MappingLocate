<?php

namespace App\Models;

class Utilities extends BaseModel
{
    protected $table = 'utilities';
    public $fillable = ['category_id', 'name', 'name_en', 'name_vi', 'name_cn', 'name_es', 'name_ko', 'address', 'address_vi', 'address_en', 'address_cn', 'address_es', 'address_ko', 'workingtime_weekday', 'workingtime_saturday', 'workingtime_holiday', 'workingtime_before_holiday', 'lat', 'long', 'memo', 'memo_en', 'memo_vi', 'memo_cn', 'memo_es', 'memo_ko', 'type', 'icon_tags_id', 'created_by', 'created_at', 'updated_at'];

    public function images() {
        return $this->hasMany(Images::class, 'utilities_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comments::class, 'utilities_id', 'id');
    }

    public function tags() {
        $relatedTable = new UtilitiesTags();
        return $this->belongsToMany(Tags::class, $relatedTable->getTable(), 'utilities_id', 'tag_id');
    }

    public function utilitiesTags() {
        return $this -> hasMany(UtilitiesTags::class, 'utilities_id', 'id');
    }

    public function utilitiesCates() {
        return $this -> hasMany(UtilitiesCate::class, 'utilities_id', 'id');
    }
    public function cates() {
        $relatedTable = new UtilitiesCate();
        return $this -> belongsToMany(Categories::class, $relatedTable -> getTable(), 'utilities_id', 'category_id');
    }
}
