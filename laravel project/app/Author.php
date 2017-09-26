<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Author extends Model
{
    use Notifiable;
    protected $table='authors';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname'
    ];



    public function Books(){

        return $this->BelongsToMany('realEudoxos\Book');
    }
}
