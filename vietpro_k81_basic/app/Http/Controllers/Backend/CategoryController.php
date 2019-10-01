<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Category\AddCategoryRequest;

use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function getCategory(){
        return view('backend.category.category');
    }

    public function postCategory(AddCategoryRequest $r)
    {
        
    }
    public function getEditCategory(){
        return view('backend.category.editcategory');
    }
  
    

}
