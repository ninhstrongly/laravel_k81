<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'=>'required|min:3|unique:product,code,'.$this->id.',id',
            'name'=>'required|min:3|unique:product,name,'.$this->id.',id',
            'price'=>'required|numeric',
            'img'=>'image'
        ];
    }
    public function messages(){
        return[
            'code.required'=>'không được để trống sản phẩm',
            'code.min'=>'Mã sản phẩm không được nhỏ hơn 3 ký tự',
            'code.unique'=>'Mã sản phẩm đã tồn tại',
            'name.required'=>'Không được để trống tên sản phẩm',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'name.min'=>'tên sản phẩm không được nhỏ hơn 3 ký tự',
            'price.required'=>'Giá không được để trống',
            'price.numeric'=>'Giá sản phẩm không đúng định dạng',
            'img.image'=>'Ảnh sản phẩm không đúng định dạng'
        ];
    }
}
