<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListLinkProduct extends Model
{
    protected $connection = 'mysql';
    protected $table = 'list_link_product';
    public $timestamps = true;
    protected $guarded = [];
}
