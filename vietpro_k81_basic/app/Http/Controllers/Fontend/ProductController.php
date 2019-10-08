<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{ Product,Category };
class ProductController extends Controller
{
    function getDetail($slug_prd){
        $data['prd'] = Product::where('slug',$slug_prd)->first();
        $data['prd_new'] = Product::orderBy('id','desc')->take(4)->get();
        return view('fontend.product.detail',$data);
    }
    function getShop(){
        $data['prds'] = Product::paginate(6);
        $data['category'] = Category::all();
        return view('fontend.product.shop',$data);
    }
}
