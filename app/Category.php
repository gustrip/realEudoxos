<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table='categories';



     protected $fillable = [
        'type','parent_id'
    ];

    //parent category
    public function parent(){
    	return $this->belongsTo('realEudoxos\Category');
    }

    public function children(){
    	return $this->hasMany('realEudoxos\Category','parent_id');
    }

    public function books(){
    	return $this->hasMany('realEudoxos\Book');
    }
}
