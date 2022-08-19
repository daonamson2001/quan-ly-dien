<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordPost extends FormRequest
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
            'password_new'=>'min:6|max:32',
            'password_old'=>'min:6|max:32',
            'password_confirm'=>'same:password_new',
        ];
    }

    public function messages()
    {
        return  [
            'password_new.min' => 'Mật Khẩu Mới Phải Trên 6 ký tự',
            'password_new.max' => 'Mật Khẩu Mới Không Quá 32 ký tự',  
            'password_old.min' => 'Mật Khẩu Phải Trên 6 ký tự',
            'password_old.max' => 'Mật Khẩu Không Quá 32 ký tự',  
            'password_confirm.same' => 'Nhập Lại Mật Khẩu Không Trùng Khớp'
        ];
    }
}
