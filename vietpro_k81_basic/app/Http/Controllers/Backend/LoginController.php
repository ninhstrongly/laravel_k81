<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Http\FormRequest\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin(){
        return View('backend.login');
    }
    public function postLogin(request $r){
        
    }
}
