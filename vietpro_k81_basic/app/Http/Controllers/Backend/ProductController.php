<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\Product\AddProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getListProduct(){
        return view('backend.product.listproduct');
    }
    public function getAddProduct(){
        return view('backend.product.addproduct');
    }
    public function postAddProduct(AddProductRequest $r){
        
    }
    public function getEditProduct(){
        return view('backend.product.editproduct');
    }
    
}
