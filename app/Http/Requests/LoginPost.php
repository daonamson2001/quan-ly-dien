<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPost extends FormRequest
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
            'password'     => 'min:6|max:32',
        ];
    }

    public function messages()
    {
        return  [
            'password.min' => 'Mật Khẩu Phải Trên 6 ký tự',
            'password.max' => 'Mật Khẩu Không Quá 32 ký tự' ,   
        ];
    }
}
