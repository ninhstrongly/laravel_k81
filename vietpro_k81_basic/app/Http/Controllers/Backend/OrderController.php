<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function getOrder(){
        return view('backend.order.order');
    }
    public function getDetailOrder(){
        return view('backend.order.detailorder');
    }
    public function getProcessed(){
        return view('backend.order.processed');
    }
    
}
