<?php

namespace App\Services;

use App\Product;

class ProductService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Product::class;
    }
}