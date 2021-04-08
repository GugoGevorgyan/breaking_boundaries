<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'club_id' => $this->club_id,
            'club_name' => $this->club->name,
            'type_id' => $this->type_id,
            'type_name' => $this->type->name,
            'city_id' => $this->city_id,
            'city_name' => $this->city->name,
            'status' => $this->name,
        ];
    }
}
