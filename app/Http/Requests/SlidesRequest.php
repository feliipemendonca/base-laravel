<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesRequest extends FormRequest
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
            'position' => ['required','integer'],
            'active' => ['required'],
            'start_at' => ['required','date'],
            'finish_at' => ['required','date'],
        ];
    }
}
