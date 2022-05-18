<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoDetailsRequest extends FormRequest
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
            'video_id'=>'required|exists:video,id',
            'file'=>'required',
            'nama'=>'required',
            'products_id'=>'required|exists:kelasbaru,kelas',
            'number'=>'string',
            'modul'=>'file|mimes:pdf,word'
        ];
    }
}
