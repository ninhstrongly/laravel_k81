<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\Product\{AddProductRequest,EditProductRequest};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\{Product,Category};
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Exports\ExportProduct;


class ProductController extends Controller
{
    public function getListProduct(){
        $product['product'] = Product::paginate(4);
        return view('backend.product.listproduct',$product);
    }
    public function getAddProduct(){
        $data['category'] = Category::all()->toarray();
        return view('backend.product.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $r){
        $prd = new Product;
        $prd->code = $r->code;
        $prd->name = $r->name;
        $prd->slug = str_slug($r->name);
        $prd->price = $r->price;
        $prd->featured = $r->featured;
        $prd->state = $r->state;
        $prd->info = $r->info;
        $prd->describe = $r->describe;

        if ($r->hasFile('img')) {
            $file = $r->img;
            $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $prd->img = $file_name;
        }
        else{
            $prd->img = 'no-img.jpg';
        }
        $prd->category_id = $r->category;
        $prd->save();
        return redirect('/admin/product/')->with('add_success','Thêm sản phẩm thành công');
    }
    public function getEditProduct($id){
        $data['category'] = Category::all();
        $data['product'] = Product::find($id);
        return view('backend.product.editproduct',$data);
    }
    public function postEditProduct(EditProductRequest $r,$id)
    {
        $prd = Product::find($id);
        $prd->code = $r->code;
        $prd->name = $r->name;
        $prd->slug = str_slug($r->name);
        $prd->price = $r->price;
        $prd->featured = $r->featured;
        $prd->state = $r->state;
        $prd->info = $r->info;
        $prd->describe = $r->describe;

        if ($r->hasFile('img')) {
            if ($id->img != 'no-img.jpg') {
                unlink('backend/img/'.$id->img);
            }
            $file = $r->img;
            $file_name = str_slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $prd->img = $file_name;
        }

        $prd->category_id = $r->category;
        $prd->save();
        return redirect('/admin/product/')->with('edit_success','Sửa sản phẩm thành công');
    }
    public function delEditProduct($id)
    {
        $prd = Product::find($id)->delete();
        return redirect('/admin/product/')->with('del_success','Xóa sản phẩm thành công');
    }
    public function test()
    {
        return view('import-recipe');
    }
  
    public function import()
    {
        Excel::import(new ImportProduct, request()->file('file'));

        return back();
    }
    public function export() 
    {
        return Excel::download(new ExportProduct, 'recipes.xlsx');
    }
    
}
