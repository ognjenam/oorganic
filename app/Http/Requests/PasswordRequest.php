<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'new_password' => 'required|regex:/([A-z]\d*\W*)/|min:5|max:15',
            'new_password_verify' => 'required|regex:/([A-z]\d*\W*)/|min:5|max:15|in:' . $this -> new_password
        ];
    }
}
