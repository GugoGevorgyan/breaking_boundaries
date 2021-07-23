<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{

    /**
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
            'image' => blogImageResource::collection($this->blogImages),
        ];
    }
}
