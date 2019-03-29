<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    

    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
     }
}
