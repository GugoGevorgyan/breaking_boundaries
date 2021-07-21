<?php

namespace App\Http\Resources;

use App\Services\ImgFile;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogImageResource extends JsonResource
{
    use ImgFile;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'name' =>$this->getFile($this->image, 'news') ,
        ];
    }
}
