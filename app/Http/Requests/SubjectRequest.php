<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'nom'=>'string|required|min:3',
            'description'=>'string|required|min:25',
            'code'=>['string','required','regex:/^I{1}K{1}-[A-Z]{3}[0-9]{3}$/i'],
            'credit'=>'numeric|required'
        ];
    }

    public function attributes()
    {
        return [
            'nom'=>'name'
        ];
    }

    public function message()
    {
        return [
          'name.string'=>'Obligatoirement une chaine de caractère',
            'nom.required'=>' champ obligatoire'
        ];
    }
}
