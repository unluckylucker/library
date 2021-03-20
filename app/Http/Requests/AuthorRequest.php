<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name'=>'required|min:3',
        ];

        if($this->route()->named('author.store')){
            $rules['name'] .= '|unique:authors,name';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно для ввод',
            'unique'=> 'Поле :attribute должно быть уникальным',
            'min'=> 'Поле :attribute должно быть минимум :min символов',
        ];
    }
}
