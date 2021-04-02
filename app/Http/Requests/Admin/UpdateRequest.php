<?php

namespace App\Http\Requests\Admin;

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
//        dd($this->admin['id']);
        return [
            'name' => 'sometimes|string',
            'email' => 'sometimes|required|email|unique:users,email,'. $this->admin['id'],
            'password' => 'sometimes|string|min:4|confirmed',
        ];
    }
}
