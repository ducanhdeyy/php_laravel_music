<?php

namespace App\Http\Requests\Client;

use App\Rules\CorrectPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'password_old' => ['required', new CorrectPassword],
            'password' => 'required|min:6|max:100',
            'password_confirmation' => 'required|same:password_confirmation'
        ];
    }
}
