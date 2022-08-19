<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QualityPost extends FormRequest
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
            'qua_name' => 'unique:qualities,qua_name',
        ];
    }

    public function messages()
    {
        return  [
            'qua_name.unique'=> 'Đã Tồn Tại Chất Lượng',
        ];
    }
}
