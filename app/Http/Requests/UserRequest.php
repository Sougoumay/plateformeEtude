<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=>'string|required|min:3',
            'prenom'=>'string|required|min:3',
            'status'=>'string|required|min:7|max:7',
            'identifiant'=>'string|required|min:8|max:12',
            'email'=>'string|required',
        ];
    }
}