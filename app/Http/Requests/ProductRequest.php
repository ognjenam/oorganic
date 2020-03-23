<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "product_name" => ["required", "regex:/^[A-z]+(\s[A-z])*$/", "min:3", "max:30"],
            "product_price" => ["required", "regex:/^[1-9]\d?\.[1-9]\d$/"],
            "product_description" => ["required", "regex:/[A-z]+\d*\W*)", "min:5", "max:200"],
            "product_category" => ["required", "numeric", "not_in:0"]
        ];
    }


    public function messages()
    {
      return [
        "product_name.required" => "Name is required!",
        "product_name.regex" => "Name is not in good format!",
        "product_price.required" => "Price is required",
        "product_price.regex" => "Price is not in good format",
        "product_description.required" => "Price is required",
        "product_description.regex" => "Description is not in good format",
        "product_category.required" => "Category is required"
      ];
    }
}
