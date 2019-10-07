<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Model\Category;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function getCategory(){
        $data['category'] = Category::all()->toarray();
        return view('backend.category.category',$data);
        
    }

    public function postCategory(AddCategoryRequest $r)
    {
        if(GetLevel(Category::all()->toarray(),$r->parent,1)>2){
            return redirect()->back()->with('false_category','Font-end không hỗ trợ danh mục 3 cấp');
        }
        else{
            $category = new Category;
            $category->name = $r->name;
            $category->slug = str_slug($r->name);
            $category->parent = $r->parent;
            $category->save();
            return redirect()->back()->with('add_category','Thêm danh mục thành công');
        }
    }
    public function getEditCategory($id){
        $data['category'] = Category::find($id);
        $data['categorys'] = Category::all()->toarray();
        return view('backend.category.editcategory',$data);
    }
    public function postEditCategory($id,EditCategoryRequest $r){
        $ctg = Category::find($id);
        if ( $ctg->name = $r->name) {
            return redirect()->back()->with('coincide_category','Danh mục đã tồn tại');
        }
        $ctg->name = $r->name;
        $ctg->slug = str_slug($r->name);
        $ctg->parent = $r->parent;
        $ctg->save();
        return redirect()->back()->with('edit_category','Sửa danh mục thành công');
    }
    

}
