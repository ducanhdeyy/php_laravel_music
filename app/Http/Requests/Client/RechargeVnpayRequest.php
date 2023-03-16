<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RechargeVnpayRequest extends FormRequest
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
            'money' => ['required','min:1']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'money' => floatval(str_replace(',', '', str_replace('$', '', $this->money)))
        ]);
    }
}
