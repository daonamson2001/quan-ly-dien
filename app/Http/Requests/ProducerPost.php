<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProducerPost extends FormRequest
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
            'pro_name'  => 'unique:producers,pro_name',
            'pro_email' => 'unique:producers,pro_email',
            'pro_phone' => 'unique:producers,pro_phone',
        ];
    }

    public function messages()
    {
        return  [
            'pro_name.unique'  => 'Đã Tồn Tại Nhà Sản Xuất',
            'pro_email.unique' => 'Đã Tồn Tại Email',
            'pro_phone.unique' => 'Đã Tồn Tại Số Điện Thoại',
        ];
    }
}
