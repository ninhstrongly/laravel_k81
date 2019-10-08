<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Product,Category};
class HomeController extends Controller
{
    function getAbout(){
        return view('fontend.home.about');
    }
    function getContact(){
        return view('fontend.home.contact');
    }
    function getIndex(){
        $data['prd_ft'] = Product::where('featured',1)->take(4)->get();
        $data['prd_new'] = Product::orderBy('id','desc')->take(8)->get();
        return view('fontend.index',$data);
    }

    function getPrdCate($slug)
    {
      
        $data['prds'] = Category::where('slug',$slug)->first()->prd()->paginate(6);
        $data['category'] = Category::all();
        return view('/fontend.product.shop',$data);
    }
    function getFinter(Request $r)
    {
        $data['prds']=product::whereBetween('price',[$r->start,$r->end])->paginate(6);
        $data['category']=Category::all();
        return view('/fontend.product.shop',$data);
    }
}
