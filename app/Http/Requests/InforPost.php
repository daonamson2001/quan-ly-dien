<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InforPost extends FormRequest
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
            'inf_phone' => 'starts_with:0',
            'inf_email' => "email"
        ];
    }

    public function messages()
    {
        return  [
            'inf_phone.starts_with' => 'Số Điện Thoại Phải Bắt Đầu Từ Số 0',
            'inf_email.email'       => 'Không Đúng Mẫu Eamil', 
        ];
    }

}
