<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GameStoreRequest extends FormRequest
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
            'date' => 'required|string|max:255',
            'home_team' => 'required|exists:teams,id|integer',
            'away_team' => 'required|exists:teams,id|integer',
            'home_goals' => 'required|integer',
            'away_goals' => 'required|integer',
        ];
    }

    public function messages()
    {
        return[
            'date.required' => 'We need to know when the game was played',
            'home_team.required' => 'You need to tell us what was the team playing at home.',
            'away_team.required' => 'You need to tell us what was the team playing at home.',
            'home_team.exists' => 'The team you selected does not exist',
            'away_team.exists' => 'The team you selected does not exist',
            'home_goals.required' => 'We need to know how many goals were scored by the home team',
            'away_goals.required' => 'We need to know how many goals were scored by the away team',

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
