<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerUpdateRequest extends FormRequest
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
            //
            'name' => 'string|max:255',
            'age' => 'integer',
            'position' => 'string|max:255',
            'nationality' => 'string|max:255',
            'condition' => 'string|max:255',
            'team' => 'exists:teams,id',
            'image' => 'image'

        ];
    }

    public function messages()
    {
        return[

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'data' => $validator->errors(),
                    'msg' => 'Validation error.'
                ], 422));
    }
}
