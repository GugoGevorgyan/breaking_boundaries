<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VlogResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'admin' => $this->admin->name
        ];
    }
}
