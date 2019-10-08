<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public function product_order()
    {
        return $this->hasMany('App\Model\ProductOrder', 'order_id', 'id');
    }
}
