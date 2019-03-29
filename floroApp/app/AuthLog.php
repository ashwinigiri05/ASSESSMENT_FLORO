<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthLog extends Model
{
    protected $fillable = [
         'user_id ', 'login_time','logout_time','brower_agent'
    ];
}
