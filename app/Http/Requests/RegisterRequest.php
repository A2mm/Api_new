<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'first_name'          => ['required'],
            'last_name'           => ['required'],
            'gender'              => ['required', Rule::in('female','male')],
            'date_of_birth'       => ['required', 'date_format:Y-m-d', 'before:today'],
            'avatar'              => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'email'               => ['nullable', 'email', 'unique:users,email'],
            'country_code'        => ['required_with:phone_number', 'exists:countries,iso'],
            'phone_number'        => ['required_with:country_code', 'unique:users,phone_number', 'min:10', 'max:15'],
        ];
    }

     public function messages()
    {
        return [
            'first_name.required'         => ['error' => 'blank'],
            'last_name.required'          => ['error' => 'blank'],
            'phone_number.required'       => ['error' => 'blank'],
            'phone_number.unique'         => ['error' => 'taken'], 
            'phone_number.min'            => ['error' => 'too short'], 
            'phone_number.max'            => ['error' => 'too long'],
            'avatar.required'             => ['error' => 'blank'],
            'email.unique'                => ['error' => 'taken'],
            'email.email'                 => ['error' => 'invalid'],
            'date_of_birth.before'        => ['error' => 'in_the_future'],
            'date_of_birth.date_format'   => ['error' => 'invalid_date_format'],
            'date_of_birth.required'      => ['error' => 'blank'], 
            'avatar.mimes'                => ['error' => 'invalid_content_type'], 
        ];
    }

     protected function failedValidation(Validator $validator)
    {
        $messages = $validator->errors();
        
        throw new HttpResponseException(
            response()->json(['errors' => $messages, 'status_code' => 400], 400)
        );
    }

}
