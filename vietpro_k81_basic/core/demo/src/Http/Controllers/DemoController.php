<?php

namespace Botble\Demo\Http\Controllers;

use App\Http\Controllers\Controller;
use Botble\Demo\Models\{Demo,User_core};

class DemoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $data['core'] = User_core::first();
        $data['test'] = Demo::first();
        return view('botble-demo::index',$data,$core);
    }
}