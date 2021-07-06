<?php

namespace Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelUpdateRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'continent' => 'required',
            'checkin_time' => 'required',
            'checkout_time' => 'required',
            'room_type' => 'required',
            'board_type' => 'required',
            'cost_per_night' => 'required',
            'feature_image' => 'sometimes|image',
            'slider_images.*' => 'sometimes|image',
        ];
    }
}
