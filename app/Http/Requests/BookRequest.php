<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name'=>'required|min:3',
            'author_id'=>'required|integer',
            'file'=>'required|file'
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Поле :attribute обязательно для ввода',
            'file'=>'Поле :attribute должно быть файлом',
            'integer'=> 'Поле :attribute должно быть целочисленным',
            'min'=> 'Поле :attribute должно быть минимум :min символов',
        ];
    }
}
