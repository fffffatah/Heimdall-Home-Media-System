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
            'username' => 'required|min:6|max:12',
            'password'=> 'required',
        ];
    }
    public function messages(){
        return [
            'username.required' => '* Username Required',
            'username.min' => '* Must be >= 6 Characters',
            'username.max' => '* Must be <= 12 Characters',
            'password.required' => '* Password Required',
        ];
    }
}
