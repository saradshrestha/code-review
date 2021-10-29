<?php

namespace Dashboard\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class NewPasswordRequest extends FormRequest
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
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'current_password.required' => 'Please Enter Your Current Password',
            'new_password.required' => 'Please Enter Your New Password',
            'new_password.required' => 'New Password Must Have 6 or More Characters',
            'password_confirmation' => 'Please Enter Your Confirm Password',
            'new_password.confirmed' => 'Your New Password And Confirm Password Must be same.'
        ];
    }
}

