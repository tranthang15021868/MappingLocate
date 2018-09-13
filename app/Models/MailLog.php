<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailLog extends BaseModel
{
    protected $table = 'mail_logs';
    protected $fillable = ['user_id', 'utilities_id', 'mail_revice', 'content', 'lat', 'long'];

    public $timestamps = true;
}
