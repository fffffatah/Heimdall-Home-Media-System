<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadShowRequest extends FormRequest
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
            'cover' => 'required',
            'title' => 'required',
            'description' => 'required',
            'year' => 'required',
            'genre' => 'required',
            'isagerestricted' => 'required',
        ];
    }
    public function messages(){
        return [
            'cover.required' => '* Cover Required',
            'title.required' => '* Title Required',
            'description.required' => '* Description Required',
            'year.required' => '* Year Required',
            'genre.required' => '* Genre Required',
            'isagerestricted.required' => '* Selection Required',
        ];
    }
}
