<?php

namespace App\Http\Resources\Api\V1\NYT\Books;

use App\Support\DataTransferObjects\NYT\Books\BestSellerItem;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read BestSellerItem $resource
 */
class BestSellersResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->resource->title,
            'price' => $this->resource->price,
            'author' => $this->resource->author,
            'isbns' => $this->resource->isbns,
            'publisher' => $this->resource->publisher,
        ];
    }
}
