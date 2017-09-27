<?php

namespace realEudoxos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastName','verified','email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember',
    ];

     public function isUser()
    {
        return true;
    }
     public function isAdmin()
    {
        return false;
    }
     public function isStudent()
    {
        return false;
    }

    public function Orders(){
        return $this->hasMany('realEudoxos\Order', 'user_id');
    }
}
