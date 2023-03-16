<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
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
            'file_url' => 'nullable|mimes:mp3,audio/mpeg',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => ['required','string','min:3','max:50'],
            'price' => ['required','numeric','regex:/^\$?(([1-9][0-9]{0,2}(,[0-9]{3})*)|([1-9][0-9]*))(\.[0-9]{1,2})?$/'],
            'singer_id' => 'required|numeric|exists:singers,id',
            'genre_id' => 'required|numeric|exists:genres,id',
            'album_id' => 'required|numeric|exists:albums,id'
        ];
    }
}
