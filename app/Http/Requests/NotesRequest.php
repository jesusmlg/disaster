<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
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
            'title' => 'required|max:255',
            'note' => 'required',
<<<<<<< HEAD
            'attachments.*' => 'max:10240',
=======
            'attachments.*' => 'max:102400',
>>>>>>> 32186c692f4a5e79f04e111148be0d9685e96db4

        ];
    }
}
