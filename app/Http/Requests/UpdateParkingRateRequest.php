<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParkingRateRequest extends FormRequest
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
            'hourly_rate' => 'required|min:0|numeric',
            'daily_rate' => 'required|min:0|numeric',
            'monthly_rate' => 'required|min:0|numeric',
        ];
    }

    public function messages()
    {
        return [
            'hourly_rate.required' => 'Giá thuê theo giờ là trường bắt buộc.',
            'hourly_rate.numeric' => 'Giá thuê theo giờ là định dạng số.',
            'hourly_rate.min' => 'Giá thuê theo giờ không được nhỏ hơn :min.',
            'daily_rate.required' => 'Giá thuê theo ngày là trường bắt buộc.',
            'daily_rate.numeric' => 'Giá thuê theo ngày là định dạng số.',
            'daily_rate.min' => 'Giá thuê theo ngày không được nhỏ hơn :min.',
            'monthly_rate.required' => 'Giá thuê theo tháng là trường bắt buộc.',
            'monthly_rate.numeric' => 'Giá thuê theo tháng là định dạng số.',
            'monthly_rate.min' => 'Giá thuê theo tháng không được nhỏ hơn :min.',
        ];
    }
}
