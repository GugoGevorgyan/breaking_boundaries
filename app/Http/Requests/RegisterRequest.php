<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => 'required|string|min:4',
            'email' => 'sometimes|required|email',
            'password' => 'required|string|min:6|confirmed',
            'b_day' => 'required|date',
            'phone' => 'required|digits_between:8,12',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
//    public function messages()
//    {
//        return [
//            'name.required'     => 'A name is required.',
//            'email.required'  => 'A email is required.',
//            'password.required'     => 'A password is required.',
//            'phone.required'    => 'A phone is required.',
//            'b_day.required'      => 'A phone is required.',
//            'b_day.date'         => 'The zip code entered is invalid.'
//
//        ];
//    }

}
