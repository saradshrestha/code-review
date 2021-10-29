<?php

namespace Post\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class PostUpdateRequest extends FormRequest
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
        // dd($request->all());
        return [
            'post_title' => 'required',
            'post_content' => 'required',
            'post_status' => 'required|integer',
            'is_published' => 'required|integer',
            'imageNames' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'Please Enter Post Title.',
            'post_content.required' => 'Please Enter Post Content',
            'post_status.required' => 'Please Select Post Status',
            'post_status.integer' => 'Invalid Data Entered.',
            'is_published.required' => 'Please Select Post Publish Status.',
            'is_published.integer' => 'Invalid Data Entered.',
            'imageNames.required' => 'Please Select An Image.',
        ];
    }
}
