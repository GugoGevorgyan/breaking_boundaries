<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "link" => $this->link,
            "title" => $this->title,
            "description" => $this->description,
            "view" => $this->view,
            'image' => NewsImageResource::collection($this->newsImages),
        ];
    }
}
