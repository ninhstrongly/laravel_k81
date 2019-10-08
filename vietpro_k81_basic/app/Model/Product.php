<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public function Category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }
}
