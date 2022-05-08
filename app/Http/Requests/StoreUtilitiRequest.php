<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUtilitiRequest extends FormRequest
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
            'name' => [
                'required', 'max:255',
                Rule::unique('utilities')->ignore($this->utiliti),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên tiện ích là trường bắt buộc.', 
            'name.max' => 'Tên tiện ích không được dài quá :max ký tự.', 
            'name.unique' => 'Tiện ích đã tồn tại.', 
        ];
    }
}
