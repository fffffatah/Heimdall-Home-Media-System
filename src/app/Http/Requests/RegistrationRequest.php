<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IsUsernameTaken;

class RegistrationRequest extends FormRequest
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
            'username' => ['required','min:6','max:12',new IsUsernameTaken()],
            'password'=> 'required|string|min:8|max:20|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'fullname' => 'required|min:12|max:24',
            'avatar' => 'required|mimes:jpg,jpeg,png',
            'password_confirmation' => 'required',
        ];
    }
    public function messages(){
        return [
            'username.required' => '* Username Required',
            'username.min' => '* Must be >= 6 Characters',
            'username.max' => '* Must be <= 12 Characters',
            'fullname.required' => '* Fullname Required',
            'fullname.min' => '* Must be >= 12 Characters',
            'fullname.max' => '* Must be <= 24 Characters',
            'password.required' => '* Password Required',
            'password.confirmed' => '* Password Must Match Confirm Password',
            'password.min' => '* Must be >= 8 Characters',
            'password.max' => '* Must be <= 20 Characters',
            'password.regex' => '* Must Contain Number & Special Character',
            'avatar.required' => '* Avatar Required',
            'avatar.mimes' => '* Invalid Image Type',
            'password_confirmation.required' => '* Confirm Password Required',
        ];
    }
}
