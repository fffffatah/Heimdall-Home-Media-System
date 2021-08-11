<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryUploadRequest extends FormRequest
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
            'title' => 'required',
            'photos' => 'required',
            'description' => 'required',
            'storage' => 'required',
        ];
    }
    public function messages(){
        return [
            'photos.required' => '* Photos Required',
            'title.required' => '* Title Required',
            'description.required' => '* Description Required',
            'storage.required' => '* Storage Required',
        ];
    }
}
