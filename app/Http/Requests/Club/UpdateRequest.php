<?php

namespace App\Http\Requests\Club;

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
//            'name' => 'sometimes|max:255|unique:clubs,name,'. $this->club['id'],
//            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg,svg|dimensions:max_width=500,max_height=400|max:960',
        ];
    }
}
