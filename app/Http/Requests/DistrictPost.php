<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictPost extends FormRequest
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
            'dis_name' => 'unique:districts,dis_name',
        ];
    }

    public function messages()
    {
        return  [
            'dis_name.unique'=> 'Đã Tồn Tại Khu Vực',
        ];
    }
}
