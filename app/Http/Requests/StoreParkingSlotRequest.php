<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParkingSlotRequest extends FormRequest
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
            'slot' => [
                'required', 'max:255', 'unique:parking_slots',
            ],
        ];
    }

    public function messages()
    {
        return [
            'slot.required' => 'Vị trí gửi là trường bắt buộc.',
            'slot.max' => 'Vị trí gửi không được dài quá :max ký tự.',
            'slot.unique' => 'Vị trí gửi đã tồn tại.',
        ];
    }
}
