<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false; //Nếu không dùng trường này thì sử dụng false để khi thêm, sửa, xóa ko bị lỗi

    public function prd()
    {
        return $this->hasMany('App\Model\Product', 'category_id', 'id');
    }
}
