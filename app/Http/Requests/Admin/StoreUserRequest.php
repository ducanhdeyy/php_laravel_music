<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'email' => ['required','email','unique:users' , 'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => 'required|min:6|max:100',
            'password_confirmation'=>'required|same:password_confirmation',
            'role' => 'required'
        ];
    }
}
