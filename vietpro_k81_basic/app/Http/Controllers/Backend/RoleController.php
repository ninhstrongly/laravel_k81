<?php

namespace App\Http\Controllers\Backend;
use DB;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $list = Role::all();
        return view('backend.role.index',compact('list'));
    }
    public function getCreate()
    {
        $per = Role::all();
        $json = json_decode($list = $per[0]->permission,true);
        return view('backend.role.add',compact('json'));
    }
    public function postCreate(Request $r)
    {
        $list = new Role;
        $list->permission = json_encode($r->permission);
        $list->name = $r->name;
        $list->display_name = $r->display_name;
        $list->save();
        DB::commit();
        return redirect('/admin/role');
    }

    public function getEdit($id)
    {
        $listPer = Role::find($id);
        $json = json_decode($listPer->permission,true);
        return view('backend.role.edit',compact('json','listPer'));
    }

    public function postEdit(Request $r,$id)
    {
       
        $list = Role::find($id);

        //$list = new Role;
        $list->permission = json_encode($r->permission);
        // $list->name = $r->name;
        // $list->display_name = $r->display_name;

        $list->save();
        
        return redirect('/admin/role');
        
    }
    public function delete($id)
    {
        $user = Role::find($id)->delete();
        return redirect('/admin/role');
    }
}
