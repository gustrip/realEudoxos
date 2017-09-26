<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use Notifiable;
    protected $table='books';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','yearOfRelease','isbn','publisher_id','category_id','price','stock','description','imageURL',
    ];


    public function Publisher(){

        return $this->belongsTo('realEudoxos\Publisher');
    
    }

    public function Authors(){

        return $this->belongsToMany('realEudoxos\Author');

    }
    public function Category(){
        return $this->belongsTo('realEudoxos\Category');
    }
}
