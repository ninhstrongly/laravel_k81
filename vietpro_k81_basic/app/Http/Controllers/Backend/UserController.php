<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users;


class UserController extends Controller
{
    public function getListUser(){
        $users['users'] = Users::all();
        return view('backend.user.listuser',$users);
    }
    public function getAddUser(){
        $users['users'] = Users::all();
        return view('backend.user.adduser',$users);
    }

    public function postAddUser(AddUserRequest $r){
        $users = new Users;
        $users->email = $r->email;
        $users->password = bcrypt($r->password);
        $users->full = $r->full;
        $users->address = $r->address;
        $users->phone = $r->phone;
        $users->level = $r->level;
        $users->save();
        return redirect('/admin/user')->with('add_user','Thêm thành viên thành công');
    }
    public function getEditUser($id){
        $users['users'] = Users::find($id);
        return view('backend.user.edituser',$users);
    }
    public function postEditUser(EditUserRequest $r,$id)
    {
        $users = Users::find($id);
        $users->email = $r->email;
        $users->password = bcrypt($r->password);
        $users->full = $r->full;
        $users->address = $r->address;
        $users->phone = $r->phone;
        $users->level = $r->level;
        $users->save();
        return redirect('/admin/user')->with('edit_user','Sửa thành viên thành công');
    }
    public function delUser($id)
    {
        $users = Users::find($id)->delete();
        return redirect('/admin/user')->with('del_user','Xóa thành viên thành công');
    }
}
