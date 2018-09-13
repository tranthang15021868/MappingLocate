<?php

namespace App\Services;

use App\Models\Comments;

class CommentsService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModel() {
        return Comments::class;
    }
}