<?php

namespace App\Http\Controllers\Fontend;
use App\Http\Requests\Cart\CheckoutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    function getCheckout(){
        return view('fontend.checkout.checkout');
    }

    function postCheckout(CheckoutRequest $r){
        
    }

    function getComplete(){
        return view('fontend.checkout.complete');
    }
}
