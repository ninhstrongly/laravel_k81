<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\carbon;
use App\Model\Order;

class IndexController extends Controller
{
    public function getIndex(){
        $month_now = carbon::now()->format('m');
        $year_now = carbon::now()->format('Y');

        for($i=1;$i <= $month_now;$i++){
            $dl['Tháng '.$i] = Order::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total');
        }
        $data['dl'] = $dl;

        $order['state'] = Order::where('state',2)->count();
        return view('backend.index',$data,$order);
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
