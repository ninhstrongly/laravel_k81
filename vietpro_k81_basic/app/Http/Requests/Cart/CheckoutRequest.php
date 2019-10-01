<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'full'=>'required|min:7',
            'email'=>'required|email',
            'phone'=>'required|min:7|max:11'
        ];
    }
    public function messages()
    {
        return[
            'full.required'=>'Tên không được để trống',
            'full.min'=>'Tên không được nhỏ hơn 7 ký tự',
            'email.email'=>'email không đúng định dạng',
            'phone.required'=>'Số điện thoại không được để trống',
            'phone.min'=>'Số điện thoại không được nhỏ hơn 7',
            'phone.max'=>'Số điện thoại không được quá 11 ký tự'
        ];
    }

}
