<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex(){
        return view('backend.index');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
