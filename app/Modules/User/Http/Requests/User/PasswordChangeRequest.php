<?php

namespace User\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'new_password.required' => 'Please Enter New Password',
            'new_password.confirmed' => 'Confirm Password and New Password Must Be Same',
        ];
    }
}
