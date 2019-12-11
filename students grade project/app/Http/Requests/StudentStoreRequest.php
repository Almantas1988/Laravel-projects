<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:64',
            'surname' => 'required|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:32',
        ];

        return $rules;
    }

    public function messages() {

        $messages = [
            'required' => 'Laukelis :attribute privalo buti uzpildytas'
        ];

        return $messages;
    }
}
