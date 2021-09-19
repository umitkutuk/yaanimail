<?php

namespace App\Http\Resources\Feed;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function ($feeds) {
            return new FeedResource($feeds);
        });

        return parent::toArray($request);
    }
}
