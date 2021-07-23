<?php

namespace App\Http\Requests\News;

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
            "link" => 'sometimes|max:255',
            "title" => 'sometimes|max:255',
            "description" => 'sometimes|max:255',
            "view" => 'sometimes|integer',
            "status" => 'sometimes|boolean',
        ];
    }
}
