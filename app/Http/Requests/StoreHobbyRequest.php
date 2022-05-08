<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHobbyRequest extends FormRequest
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
                Rule::unique('hobbys')->ignore($this->hobby),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sở thích là trường bắt buộc.', 
            'name.max' => 'Tên sở thích không được dài quá :max ký tự.', 
            'name.unique' => 'Sở thích đã tồn tại.', 
        ];
    }
}
