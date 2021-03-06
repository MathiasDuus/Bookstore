<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
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
        if (Request::isMethod('post'))
        {
            return [
                'abbreviation' => 'required|unique:countries|max:255',
                'name' => 'required|unique:countries|max:255'
            ];
        }
        else {
            return [
                'name' => [Rule::unique('countries')->ignore($this->country)->where('name', $this->country),
                    'required', 'max:255']
            ];
        }
    }
}
