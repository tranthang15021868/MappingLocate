<?php

namespace App\Services;


use App\Models\Categories;

class CategoriesService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Categories::class;
    }

    // public function getALL() {
    //     return Categories::all();
    // }
}