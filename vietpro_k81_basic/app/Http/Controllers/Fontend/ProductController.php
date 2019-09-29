<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function getDetail(){
        return view('fontend.product.detail');
    }
    function getShop(){
        return view('fontend.product.shop');
    }
}
