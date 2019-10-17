<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\EditUserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Users,Role};
use DB;

class UserController extends Controller
{
    public function getListUser(){
        $users['users'] = Users::paginate(4);
        return view('backend.user.listuser',$users);
    }
    public function getAddUser(){
        $users = Users::all();
        $listRole = Role::all();
        return view('backend.user.adduser',compact('listRole','users'));
    }

    public function postAddUser(AddUserRequest $r){
        try{
            DB::beginTransaction();
            $listUser = new Users;
            $listUser->email = $r->email;
            $listUser->password = bcrypt($r->password);
            $listUser->full = $r->full;
            $listUser->address = $r->address;
            $listUser->phone = $r->phone;
            $listUser->save();
            $listUser->roles()->attach($r->roles);
            DB::commit();
            return redirect('/admin/user')->with('add_user','Thêm thành viên thành công');
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
    public function getEditUser($id){
        $users = Users::find($id);
        $listRole = Role::all();
        $listRoleAll = DB::table('role_user')->where('user_id',$id)->pluck('role_id');
        return view('backend.user.edituser',compact('users','listRole','listRoleAll'));
    }
    public function postEditUser(EditUserRequest $r,$id)
    {
        try{
            DB::beginTransaction();
            $user = Users::find($id);
            $user->email = $r->email;
            if($r->password == ''){
                $user->password = $user->password;
            }
            else{
                $user->password = bcrypt($r->password);
            }
            $user->full = $r->full;
            $user->address = $r->address;
            $user->phone = $r->phone;
            $user->save();
            
            $ninh = DB::table('role_user')->where('user_id',$id)->delete();
            
            $user_find = Users::find($id);
    
            $user_find->roles()->attach($r->roles);     
            DB::commit();
            return redirect('/admin/user')->with('edit_user','Sửa thành viên thành công');
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
    public function delUser($id)
    {
        try{
            DB::beginTransaction();
            $user = Users::find($id);
            $user->delete();
            $user->roles()->detach();
            DB::commit();
            return redirect('/admin/user')->with('del_user','Xóa thành viên thành công');
        }catch(\Exception $exception){
            DB::rollBack();
        }
    }
}

