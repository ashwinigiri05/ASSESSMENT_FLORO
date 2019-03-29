<?php

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;
use App\UserActivity;
class User extends Authenticatable
{
    use Notifiable;
    use Sortable;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'username', 'firstname', 'lastname','email','address','house_number','postal_code','city','password','last_login_at',
        'remember_token',
    ];
    
    public $sortable = ['username', 'firstname', 'lastname', 'email','created_at', 'updated_at'];
    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }

    public function UserActivity()
    {
        return $this->hasMany('App\UserActivity');
    }
}
