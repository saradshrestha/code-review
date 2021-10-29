<?php

namespace User\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' =>'required|email',
            'status'  => 'required|integer',
            'role' =>'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Please Enter Name',
            'email.required' => 'Please Enter an E-mail Address',
            'email.email' => 'Please Enter A Valid E-mail Address',
            'status.required' => 'Please Enter User Status',
            'role.required' => 'Please Select a Role For The User',
        ];
    }

    // protected function getRedirectUrl (){
    //     return route ('backend.users.changePassword');
    // }
}
