<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RegistrationPost extends FormRequest
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
            'username'          => 'unique:users,username',
            'birth'             => "before:".Carbon::now()->subYears(18),
            'phone_number'      => 'starts_with:0',
            'email'             => 'unique:users,email|required_with:gmail.com',
            'date_joining'      => 'before_or_equal:today',
            'password'          => 'min:6|max:32',
            'password_confirm'  => 'same:password',
        ];
    }


    public function messages()
    {
        return  [
            'username.unique'              => 'Đã Tồn Tại Tên Đăng Nhập ',
            'email.required_with'          => 'Không Đúng Mẫu Email',
            'email.unique'                 => 'Đã Tồn Tại Email Này Ở Một Người Dùng Khác!',
            'birth.before'                 => 'Bạn Chưa Đủ 18 Tuổi !',
            'phone_number.starts_with'     => 'Số Điện Thoại Phải Bắt Đầu Bằng Số 0',
            'date_joining.before_or_equal' => 'Ngày Vào Làm Phải Trước Hoặc Bằng Ngày Hôm Nay !',
            'password.min'                 => 'Mật Khẩu Mới Phải Trên 6 Ký Tự !',
            'password.max'                 => 'Mật Khẩu Mới Không Quá 32 Ký Tự !',   
            'password_confirm.same'        => 'Nhập Lại Mật Khẩu Không Trùng Khớp'
        ];
    }
}
