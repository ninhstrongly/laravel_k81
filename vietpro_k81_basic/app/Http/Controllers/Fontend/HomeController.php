<?php

namespace App\Http\Controllers\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function getAbout(){
        return view('fontend.home.about');
    }
    function getContact(){
        return view('fontend.home.contact');
    }
    function getIndex(){
        return view('fontend.index');
    }
}
