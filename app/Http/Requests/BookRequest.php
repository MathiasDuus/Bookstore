<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\ValidationRules\Rules\Delimited;

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
            'name' => 'required|max:255',
            'author' => 'required|exists:authors,name|max:255',
            'publisher' => 'required|exists:publishers,name|max:255',
            'price' => 'required|numeric|digits_between:1,11',
            'release_date' => 'required|date',
            'pages' => 'required|integer|digits_between:1,11',
            'genre' => [(new Delimited('max:255'))],
        ];
    }
}
