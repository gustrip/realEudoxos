<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class University extends Model
{
    use Notifiable;
    protected $table='universities';


    protected $fillable = [
        'name','number_of_students','weight','total_points','won'
    ];

    public function Students(){

    	return $this->hasMany('realEudoxos\Student');

    }
}
