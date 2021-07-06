<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteUpdateRequest extends FormRequest
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
            'title' => 'required|max:100',
            'logo' => 'sometimes|image',
            'logo_light' => 'sometimes|image',
            'favicon' => 'sometimes|image',
            'breadcrumb_image' => 'sometimes|image',
        ];
    }
}
