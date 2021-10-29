<?php

namespace Category\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'parent_id' =>'required',
            'status'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please Enter Category Title',
            'parent_id.required' => 'Please Select Category Type',
            'status.required' => 'Please Enter Category Status',
        ];
    }
}
