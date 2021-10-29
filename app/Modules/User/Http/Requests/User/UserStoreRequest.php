<?php

namespace User\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' =>'required|unique:users|email',
            'status' => 'required|integer',
            'role' => 'required|string',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please Enter Name',
            'email.unique' => 'Email Already in use. Please Enter Another Email.',
            'email.required' => 'Please Enter an Email Address',
            'email.email' => 'Please Enter A Valid E-mail Address',
            'status.required' => 'Please Enter User Status',
            'password.required' => 'Please Enter Password',
            'password.min' => 'Password Must Be More Than 5 Characters',
            'role.required' => 'Please Select a Role For The User',
            'password_confirmation' => 'Please Enter Confirm Password',
            'status.integer' => "Invalid Data Entered",
            'role.string' => "Invalid Data Entered",
        ];
    }
}
