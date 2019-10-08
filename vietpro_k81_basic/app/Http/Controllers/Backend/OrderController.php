<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
class OrderController extends Controller
{
    public function getOrder(){
        $data['order'] = Order::where('state',2)->orderBy('id','desc')->paginate(4);
        return view('backend.order.order',$data);
    }
   
    public function getProcessed(){
        $data['order'] = Order::where('state',1)->orderBy('updated_at','desc')->paginate(4);
        return view('backend.order.processed',$data);
    }
    public function getDetailOrder($id){
        $data['order'] = Order::find($id);
        return view('backend.order.detail',$data);
    }
    public function paid($id)
    {
        $order = Order::find($id);
        $order->state = 1;
        $order->save();
        return redirect('admin/order')->with('order_success','Đơn hàng đã được xử lý');
    }
    
}
