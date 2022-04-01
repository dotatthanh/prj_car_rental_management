<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'from_date' => 'required|date|after:yesterday',
            'to_date' => 'required|date|after_or_equal:from_date',
        ];
    }

    public function messages()
    {
        return [
            'from_date.required' => 'Ngày bắt đầu thuê là trường bắt buộc.',
            'from_date.date' => 'Ngày bắt đầu thuê không đúng định dạng.',
            'from_date.after' => 'Ngày bắt đầu thuê phải lớn hơn hoặc bằng ngày hôm nay.',
            'to_date.required' => 'Ngày kết thúc thuê là trường bắt buộc.',
            'to_date.date' => 'Ngày kết thúc thuê không đúng định dạng.',
            'to_date.after_or_equal' => 'Ngày kết thúc thuê phải lớn hơn hoặc bằng Ngày bắt đầu thuê.',
        ];
    }
}
