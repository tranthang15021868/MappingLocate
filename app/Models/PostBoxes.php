<?php

namespace App\Models;

class PostBoxes extends BaseModel
{
    protected $table = 'postboxes';
    public $fillable = ['post_id', 'code', 'collection_branch', 'utilities_id', 'created_at', 'updated_at'];

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
}
