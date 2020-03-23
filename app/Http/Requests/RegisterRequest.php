<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "register-email" => [
              "required",
              "email",
              "max:30"
            ],
            "register-username" =>
            [
              "required",
              "regex:/^[a-z]+\d*\_*$/", "min:3", "max:8"
            ],
            "register-password" =>
            [
              "required",
              "regex:/[A-z]+\d*\W*/", "min:5", "max:15"
            ]
        ];
    }

    public function messages()
    {
      return [
        "register-email.required" => "Email is required!",
        "register-email.email" => "Email is not in good format!",
        "register-email.max" => "Email is too long!",

        "register-username.required" => "Username is required",
        "register-username.regex" => "Username format is not good!",

        "register-password.required" => "Password is required!",
        "register-password.regex" => "Password is not in good format!"

      ];
    }
}
