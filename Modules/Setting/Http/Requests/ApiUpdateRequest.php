<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiUpdateRequest extends FormRequest
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
            'sandbox_username' => 'required',
            'sandbox_password' => 'required',
            'sandbox_secret' => 'required',
            'sandbox_certificate' => '',
            'sandbox_app_id' => '',
            'currency' => ''
        ];
    }
}
