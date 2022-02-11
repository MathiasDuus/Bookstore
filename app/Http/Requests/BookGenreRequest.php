<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookGenreRequest extends FormRequest
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
            'book_id' => [Rule::unique('book_genres','book_id')->where('genre_id', $this->genre_id),
                'required', 'numeric', 'digits_between:1,11', 'exists:books,id'],

            'genre_id' => [Rule::unique('book_genres','genre_id')->where('book_id', $this->book_id),
                'required', 'numeric', 'digits_between:1,11', 'exists:genres,id'],
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return[
            'book_id.unique'=>'Book and genre combination already exists',
            'genre_id.unique'=>'Book and genre combination already exists'
        ];
    }

}
