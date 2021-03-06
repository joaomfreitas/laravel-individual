<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class WebLeagueStoreRequest extends FormRequest
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
            'name' => 'required|unique:leagues|string|max:255',
            'country' => 'required|string|max:255',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'You need to fill the name field',
            'country.required' => 'You need to fill the country field',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
//        $champID = $this->request->get('id_champion');
        throw new HttpResponseException(
//            response()->Redirect::back()->withErrors($validator));
            response()->redirectTo('leagues/create')->withErrors($validator));

    }
}
