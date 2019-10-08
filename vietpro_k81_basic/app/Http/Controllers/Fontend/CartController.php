<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Cart;


class CartController extends Controller
{
    function getCart(){
        $data['items'] = Cart::content();
        
        $data['total'] = Cart::total(0, '', '.');
        return view('fontend.cart.cart',$data);
    }
    function AddCart(Request $r)
    {
        $prd = Product::find($r->id_prd);
        if($r->has('qty')){
            
            $qty = $r->qty;
        }
        else{
            $qty = 1;
        }
        
        Cart::add([
                    'id' => $prd->code,
                    'name' => $prd->name,
                    'qty' => $qty,
                    'price' => $prd->price, 
                    'weight' => 0, 
                    'options' => ['img' => $prd->img]]);
                    
        return redirect('cart');
    }
    function UpdateCart($rowId,$qty)
    {
        Cart::update($rowId,$qty);
        return 'success';
    }
    function DelCart($rowId)
    {
       Cart::remove($rowId);
       return redirect()->back();
    }
}
