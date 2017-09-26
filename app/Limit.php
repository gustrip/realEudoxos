<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    protected $table='limit';

    protected $fillable = [
        'limit','active'
    ];



}
