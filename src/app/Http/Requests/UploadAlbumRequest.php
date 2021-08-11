<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadAlbumRequest extends FormRequest
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
            'songs' => 'required',
            'title' => 'required',
            'artist' => 'required',
            'year' => 'required',
            'genre' => 'required',
            'storage' => 'required',
            'isagerestricted' => 'required',
        ];
    }
    public function messages(){
        return [
            'cover.required' => '* Cover Required',
            'title.required' => '* Title Required',
            'artist.required' => '* Artist Required',
            'songs.required' => '* Songs Required',
            'year.required' => '* Year Required',
            'genre.required' => '* Genre Required',
            'storage.required' => '* Storage Required',
            'isagerestricted.required' => '* Selection Required',
        ];
    }
}
