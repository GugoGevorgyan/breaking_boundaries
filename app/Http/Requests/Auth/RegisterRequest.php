<?php

namespace App\Http\Requests\Auth;

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
//            'name' => 'required|string|min:4',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//            'age' => 'required|digits_between:1,2',
//            'phone' => 'required|digits_between:8,15|unique:users',
//            'team_id'=>'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

}
