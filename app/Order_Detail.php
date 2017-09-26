<?php

namespace realEudoxos;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{

    protected $table='order_details';

    public function Order(){
        return $this->belongsTo('realEudoxos\Order');
    }

    public function Book(){
        return $this->hasOne('realEudoxos\Book','id','book_id');
    }
}
