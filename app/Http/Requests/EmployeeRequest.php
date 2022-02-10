<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'mail' => 'required|email:rfc|unique:employees|max:255',/*TODO: Add "dns" to email rule*/
            'store_id' => 'required|exists:stores,id|numeric|digits_between:1,11',
            'department' => 'required|exists:departments,name|max:255',
        ];
    }
}
