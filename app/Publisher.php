<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publisher extends Model
{
    use Notifiable;
    protected $table='publishers';

    protected $fillable = [
        'name',
    ];


    public function Books(){

    	return $this->hasMany('realEudoxos\Book');

    }
}
