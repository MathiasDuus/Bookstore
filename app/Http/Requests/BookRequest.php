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
            'author_id' => 'required|exists:authors,id|numeric|digits_between:1,11',
            'publisher_id' => 'required|exists:publishers,id|numeric|digits_between:1,11',
            'price' => 'required|numeric|max:999999.99',
            'release_date' => 'required|date|max:255',/*|date_format:Y-d-m*/
            'pages' => 'required|integer|digits_between:1,9',
        ];
    }
}
