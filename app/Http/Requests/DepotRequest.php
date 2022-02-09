<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepotRequest extends FormRequest
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
            'amount' => 'required|numeric|digits_between:1,11',
            'book_id' => 'required|exists:books,id|numeric|digits_between:1,11',
            'store_id' => 'required|exists:stores,id|numeric|digits_between:1,11',
        ];
    }
}
