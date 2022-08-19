<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitPost extends FormRequest
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
            'unit_name' => 'unique:units,unit_name',
        ];
    }

    public function messages()
    {
        return  [
            'unit_name.unique'=> 'Đã Tồn Tại Đơn Vị Tính',
        ];
    }
}
