<?php

namespace Modules\Ums\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
        // find route id
        $id = request()->route()->parameters()[request()->route()->parameterNames[0]];

        return [
            'first_name' => 'required',
            'avatar' => 'sometimes|image|max:1024',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'required',
        ];
    }
}
