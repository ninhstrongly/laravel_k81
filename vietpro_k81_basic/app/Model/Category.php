<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false; //Nếu không dùng trường này thì sử dụng false để khi thêm, sửa, xóa ko bị lỗi
}
