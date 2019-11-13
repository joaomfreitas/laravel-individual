<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerStoreRequest extends FormRequest
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

//'name', 'age', 'position', 'nationality', 'condition', 'team', 'image'

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'position' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'condition' => 'required|string|max:255',
            'team' => 'required|exists:teams,id',
            'image' => 'required|image'

        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'You need to fill the name field',
            'age.required' => 'You need to fill the age field',
            'position.required' => 'You need to fill the player position',
            'nationality.required' => 'You need to fill the player nationality',
            'condition.required' => 'You need to fill the player current condition',
            'team.required' => 'A player needs to have a team, if none select NULL TEAM',
            'image.required' => 'U most provide an image for your player or use the default one'
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
