<?php

namespace App\Http\Requests;

use App\Rules\IsPasswordValid;
use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'current_password' => ['required',new IsPasswordValid()],
            'password'=> 'required|string|min:8|max:20|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'password_confirmation' => 'required',
        ];
    }
    public function messages(){
        return [
            'current_password.required' => '* Current Password Required',
            'password.required' => '* Password Required',
            'password.confirmed' => '* Password Must Match Confirm Password',
            'password.min' => '* Must be >= 8 Characters',
            'password.max' => '* Must be <= 20 Characters',
            'password.regex' => '* Must Contain Number & Special Character',
            'password_confirmation.required' => '* Confirm Password Required',
        ];
    }
}
