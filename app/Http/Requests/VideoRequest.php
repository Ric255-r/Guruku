<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'products_id' => 'required|exists:kelasbaru,kelas', //ini tadi kelas
            //'video'=> 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'judul'=> 'required',
            //'products_slug'=>'nullable'
            //'is_default'=>'boolean'
        ];
    }
}
