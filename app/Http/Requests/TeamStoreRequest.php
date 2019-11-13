<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TeamStoreRequest extends FormRequest
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
            'name' => 'required|unique:teams|string|max:255',
            'city' => 'required|string|max:255',
            'budget' => 'required|string|max:255',
            'image' => 'required|image',
            'league' => 'required|exists:leagues,id'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'You need to fill the team name field',
            'city.required' => 'You need to fill the team city field',
            'budget.required' => 'You need to fill the team budget field',
            'image.required' => 'You need to insert an image for the team',
            'league.required' => 'You need to fill the team league field'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->redirectTo('teams/create')->withErrors($validator));
    }
}
