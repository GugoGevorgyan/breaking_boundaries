<?php

namespace App\Http\Requests\Club;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|max:20|unique:clubs',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,svg|dimensions:max_width=500,max_height=400|max:960',
        ];
    }
}
