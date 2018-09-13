<?php

namespace App\Models;

class Categories extends BaseModel
{
    protected $guarded = [];

    const TYPE_ALL = 0;
    const TYPE_VENDING_MACHINE = 1;
    const TYPE_POSTBOX = 2;
    const TYPE_CAFE_SHOP = 3;
    const TYPE_CONVENIENCE_STORE = 4;
    const TYPE_SUPERMARKET = 5;
}
