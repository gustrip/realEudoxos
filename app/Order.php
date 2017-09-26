<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table='orders';

    public function OrderDetails(){
        return $this->hasMany('realEudoxos\Order_Detail');
    }

    public function User()
    {
        return $this->belongsTo('realEudoxos\User');
    }

    public function Student()
    {
        return $this->belongsTo('realEudoxos\Student');
    }

}
