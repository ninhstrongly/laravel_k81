<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\User\AddUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getListUser(){
        return view('backend.user.listuser');
    }
    public function getAddUser(){
        return view('backend.user.adduser');
    }

    public function postAddUser(AddUserRequest $r){
        
    }
    public function getEditUser(){
        return view('backend.user.edituser');
    }
}
