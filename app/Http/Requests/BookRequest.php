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
            'price' => 'required|numeric|max:99999999,99',
            'release_date' => 'required|date',
            'pages' => 'required|numeric|max:99999999999',
            'genre' => [(new Delimited('max:255'))],
        ];
    }
}
