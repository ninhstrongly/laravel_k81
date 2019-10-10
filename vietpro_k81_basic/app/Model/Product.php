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
    protected $fillable = [
        'code',
        'name',
        'slug',
        'price',
        'featured',
        'state',
        'info',
        'describe',
        'img',
        'category_id',
    ];
}
