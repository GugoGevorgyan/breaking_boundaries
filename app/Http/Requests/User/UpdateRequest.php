<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|string|min:4',
            'email' => 'sometimes|email|unique:users,email,'. $this->user['id'],
            'password' => 'sometimes|string|min:6|confirmed',
            'age' => 'sometimes|digits_between:1,2',
            'phone' => 'sometimes|digits_between:8,15|unique:users,phone,'.$this->user['id'],
//            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg,svg|dimensions:max_width=800,max_height=400|max:960',
        ];
    }
}
