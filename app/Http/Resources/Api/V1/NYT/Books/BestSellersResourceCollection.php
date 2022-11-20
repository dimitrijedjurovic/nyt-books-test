<?php

namespace App\Http\Resources\Api\V1\NYT\Books;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BestSellersResourceCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => BestSellersResource::collection($this->collection),
        ];
    }
}
