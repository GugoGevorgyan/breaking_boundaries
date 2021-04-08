<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = !empty($this->image) ? asset('storage/clubs/' . $this->image) : null;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image'=>$image,
        ];
    }
}
