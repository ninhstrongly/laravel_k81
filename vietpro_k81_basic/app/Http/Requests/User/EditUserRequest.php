<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
            'phone'=>'required|min:4',
            'full'=>'required|min:7|unique:users,email',
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'Email không được để trống',
            'email.email'=>'email không đúng định dạng',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'Password không được để trống',
            'password.min'=>'Password không được nhỏ hơn 5 ký tự',
            'phone.required'=>'Phone không được để trống',
            'phone.min'=>'Phone không được nhỏ hơn 4 ký tự',
            'full.required'=>'Full không được để trống',
            'full.min'=>'Full không được nhỏ hơn 7 ký tự',
            'full.unique'=>'Full không đúng định dạng'
        ];
    }
}
