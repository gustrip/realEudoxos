<?php

namespace realEudoxos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use realEudoxos\Notifications\StudentResetPasswordNotification;

class Student extends Authenticatable
{
    use Notifiable;

    protected $table='students';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','lastName' ,'email','password','points','university_id','verified','email_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

      public function isUser()
    {
        return false;
    }
     public function isAdmin()
    {
        return false;
    }
     public function isStudent()
    {
        return true;
    }

    public function Orders(){
          return $this->hasMany('realEudoxos\Order', 'student_id');
    }

    public function sendPasswordResetNotification($token)
  {
      $this->notify(new StudentResetPasswordNotification($token));
  }

  public function University(){

        return $this->belongsTo('realEudoxos\University');
    
    }
}
