<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderLineRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id|numeric|digits_between:1,11',
            'book_id' => 'required|exists:books,id|numeric|digits_between:1,11',
            'quantity' => 'required|numeric|digits_between:1,11',
            'price' => 'numeric|digits_between:1,11',
        ];
    }
}
