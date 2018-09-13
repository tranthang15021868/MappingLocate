<?php

namespace App\Services;

use App\ListLinkProduct;

class ListLinkProductService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return ListLinkProduct::class;
    }

    public function count(){
        return $this->_model->count();
    }
 }