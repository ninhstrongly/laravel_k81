<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Requests\Cart\CheckoutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Model\{ Order,ProductOrder};
class CheckoutController extends Controller
{
    function getCheckout(){
        
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,"",",");
        return view('fontend.checkout.checkout',$data);
    }

    function postCheckout(CheckoutRequest $r){
        $order = new Order;
        $order->full = $r->full;
        $order->address = $r->address;
        $order->email = $r->email;
        $order->phone = $r->phone;
        $order->total = Cart::total(0,'','');
        $order->state = 2;
        $order->save();
        
        foreach(Cart::content() as $row){
            $prd = new ProductOrder;
            $prd->code = $row->id;
            $prd->name = $row->name;
            
            $prd->price = $row->price;
            $prd->qty = $row->qty;
            $prd->img = $row->options->img;
            $prd->order_id = $order->id;
            $prd->save();
        }

        //Delete
        Cart::destroy();
        return redirect('checkout/complete/'.$order->id);
    }

    function getComplete($order_id){
        $data['order'] = Order::find($order_id);
        return view('fontend.checkout.complete',$data);
    }
}
