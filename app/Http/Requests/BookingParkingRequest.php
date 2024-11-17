<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingParkingRequest extends FormRequest
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
        switch ($this->form_rent) {
            case 'Thuê theo giờ':
                $rules['start_time'] = 'required';
                $rules['start_date'] = 'required';
                $rules['end_time'] = 'required';
                $rules['end_date'] = 'required';
                break;

            case 'Thuê theo ngày':
                $rules['start_date'] = 'required';
                $rules['end_date'] = 'required';
                break;

            case 'Thuê theo tháng':
                $rules['start_date'] = 'required';
                $rules['month'] = 'required|numeric|min:1';
                break;
        }

        $rules['parking_slot_id'] = 'required';
        $rules['form_rent'] = 'required';

        return $rules;
    }

    public function messages()
    {
        return [
            'start_time.required' => 'Thời gian bắt đầu là trường bắt buộc.',
            'start_date.required' => 'Ngày bắt đầu là trường bắt buộc.',
            'end_time.required' => 'Thời gian kết thúc là trường bắt buộc.',
            'end_date.required' => 'Ngày kết thúc là trường bắt buộc.',
            'month.required' => 'Số tháng là trường bắt buộc.',
            'parking_slot_id.required' => 'Vị trí gửi xe là trường bắt buộc.',
            'form_rent.required' => 'Hình thức thuê là trường bắt buộc.',
        ];
    }
}
