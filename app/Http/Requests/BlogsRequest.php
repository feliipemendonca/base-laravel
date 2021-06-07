<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogsRequest extends FormRequest
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
            'file' => ['max:300','mimes:png,jpg', $this->method() != 'PUT' ? 'required' : ''],
            'title' => ['required'],
            'tags' => ['required'],
            'seo' => ['required'],
            'caption' => ['required'],
            'description' => ['required'],
            'active' => ['required','boolean'],
            'publish_at' => ['required'],
        ];
    }
}
