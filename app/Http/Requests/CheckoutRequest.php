<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'bukti' => 'required|file|image|mimes:jpeg,png,jpg',
            'transaction_total' => 'nullable|integer',
            'transaction_status' => 'nullable|in:PENDING,SUCCESS,FAILED',
            'transaction_details' => 'required',
            'transaction_details.*' => 'exists:kelasbaru,kelas',
            'user_id' => 'required|exists:users,id',
            'mentor_id'=>'required|exists:users,kode_mentor'
        ];
    }
}
