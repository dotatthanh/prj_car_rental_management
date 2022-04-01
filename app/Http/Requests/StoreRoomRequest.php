<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends FormRequest
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
                // Rule::unique('rooms')->ignore($this->room),
            ],
            'acreage' => 'required|numeric|min:0',
            'address' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'acreage.required' => 'Diện tích là trường bắt buộc.', 
            'acreage.numeric' => 'Diện tích là định dạng số.', 
            'acreage.min' => 'Diện tích không được nhỏ hơn :min.', 
            'name.required' => 'Tiêu đề là trường bắt buộc.', 
            'name.max' => 'Tiêu đề không được dài quá :max ký tự.', 
            // 'name.unique' => 'Tiêu đề đã tồn tại.', 
            'address.required' => 'Địa chỉ là trường bắt buộc.', 
            'address.max' => 'Địa chỉ không được dài quá :max ký tự.', 
            'description.required' => 'Mô tả là trường bắt buộc.', 
            'price.required' => 'Giá là trường bắt buộc.', 
            'price.numeric' => 'Giá là định dạng số.', 
            'price.min' => 'Giá không được nhỏ hơn :min.', 
            'image.required' => 'Ảnh là trường bắt buộc.', 
            'image.min' => 'Ảnh phải là hình ảnh (jpg, jpeg, png, bmp, gif, svg hoặc webp).', 
        ];
    }
}
