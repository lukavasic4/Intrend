<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
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
            "first_name" => "regex:/^[A-Z][a-z]{1,20}$/",
            "last_name" => "regex:/^[A-Z][a-z]{1,20}$/",
            "email" => "regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",
            "password" => "regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/"
        ];
    }
}
