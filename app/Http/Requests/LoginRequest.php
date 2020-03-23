<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
          "login-username" => [
            "required",
            "regex:/^[a-z]+\d*\_*$/",
            "min:3",
            "max:8"
          ],

          "login-password" => [
            "required",
            "regex:/[A-z]+\d*\W*/",
            "min:5",
            "max:15"
          ]
        ];
    }


    public function messages(){
        return [
            "login-username.required" => "Username is required!",
            "login-username.regex" => "Username is not in good format!",
            "login-password.required" => "Password is required!",
            "login-password.regex" => "Password is not in good format!"
        ];
    }

}
