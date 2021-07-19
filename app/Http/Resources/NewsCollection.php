<?php

namespace App\Http\Resources;

use App\Tools\Collection;
use Illuminate\Http\Request;

class NewsCollection extends Collection
{
    public $collects = NewsResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->makeResponse();
    }
}
