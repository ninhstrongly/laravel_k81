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
            'email'=>'required|email|',
            'phone'=>'required|min:4',
            'full'=>'required|min:7|unique:users,email',
        ];
    }
    public function messages()
    {
        return[
            'email.required'=>'Email không được để trống',
            'email.email'=>'email không đúng định dạng',
            'phone.required'=>'Phone không được để trống',
            'phone.min'=>'Phone không được nhỏ hơn 4 ký tự',
            'full.required'=>'Full không được để trống',
            'full.min'=>'Full không được nhỏ hơn 7 ký tự',
            'full.unique'=>'Full không đúng định dạng'
        ];
    }
}
