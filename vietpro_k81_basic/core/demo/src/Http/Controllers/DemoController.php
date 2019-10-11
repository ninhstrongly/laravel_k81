<?php

namespace Botble\Demo\Http\Controllers;

use App\Http\Controllers\Controller;
use Botble\Demo\Models\Demo;

class DemoController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $data['test'] = Demo::first();
        return view('botble-demo::index',$data);
    }
}