<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'mail' => [Rule::unique('employees')->ignore($this->employee)->where('mail', $this->mail),
                'required', 'email:rfc,dns', 'max:255'],
            'store_id' => 'required|exists:stores,id|numeric|digits_between:1,11',
            'department' => 'required|exists:departments,name|max:255',
        ];
    }
}
