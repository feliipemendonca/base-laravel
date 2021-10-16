<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'file'                  => ['max:300','mimes:png,jpg', $this->method() != 'PUT' ? 'required' : ''],
            'name'                  => ['required', 'min:3'],
            'email'                 => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'phone'                 => ['required', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'old_password'          => ['min:6'],
            'password'              => ['min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['min:6'],
        ];
    }
}
