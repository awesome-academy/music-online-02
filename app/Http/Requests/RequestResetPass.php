<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPass extends FormRequest
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
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Please enter password',
            'password.min' => 'The password must be more than 6 characters',
            're_password.required' => 'Please enter re-password',
            're_password.same' => 'Incorrect re-password',
        ];
    }
}
