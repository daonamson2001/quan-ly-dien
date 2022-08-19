<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ChangeUserPost extends FormRequest
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
            'birth'             => "before:".Carbon::now()->subYears(18),
            'phone_number'      => 'starts_with:0',
            'email'             => 'required_with:gmail.com',
            'date_joining'      => 'before_or_equal:today',
        ];
    }

    public function messages()
    {
        return  [
            'email.required_with'          => 'Không Đúng Mẫu Email',
            'birth.before'                 => 'Bạn Chưa Đủ 18 Tuổi !',
            'phone_number.starts_with'     => 'Số Điện Thoại Phải Bắt Đầu Bằng Số 0',
            'date_joining.before_or_equal' => 'Ngày Vào Làm Phải Trước Hoặc Bằng Ngày Hôm Nay !',
        ];
    }
}
