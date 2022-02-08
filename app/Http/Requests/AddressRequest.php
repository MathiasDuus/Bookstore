<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'postal_id' => 'required|exists:postals,id|numeric|digits_between:1,11',
            'street' => 'required|max:255',
            'mail' => 'required|email:rfc|exists:customers,mail|max:255',/*TODO: Add "dns" to email rule*/
        ];
    }
}
