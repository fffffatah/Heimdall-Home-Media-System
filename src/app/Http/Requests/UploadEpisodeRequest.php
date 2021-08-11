<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadEpisodeRequest extends FormRequest
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
            'episode' => 'required|mimes:mp4,mkv',
            'title' => 'required',
            'description' => 'required',
            'season' => 'required',
            'show' => 'required',
            'storage' => 'required',
        ];
    }
    public function messages(){
        return [
            'title.required' => '* Title Required',
            'description.required' => '* Description Required',
            'episode.required' => '* Episode Required',
            'episode.mimes' => '* Episode Must Be mp4 or mkv',
            'season.required' => '* Season Required',
            'storage.required' => '* Storage Required',
            'show.required' => '* Selection Required',
        ];
    }
}
