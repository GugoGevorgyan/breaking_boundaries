<?php

namespace App\Http\Requests\Game;

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
            'league_id'=>'sometimes|integer',
            'team_id'=>'sometimes|integer',
            'thrown_ball'=>'sometimes|max:3',
            'team1_id'=>'sometimes|integer',
            'team2_id'=>'sometimes|integer',
        ];
    }
}
