<?php

namespace App\Actions\NYT;

use App\Services\Clients\NYTClient;
use App\Support\DataTransferObjects\NYT\Books\BestSellerItem;
use App\Support\DataTransferObjects\NYT\Books\BestSellersFilters;

class BooksAction
{
    public function __construct(protected NYTClient $nytClient)
    {
    }

    public function getBestSellers(BestSellersFilters $filters): mixed
    {
        return BestSellerItem::collection(
            $this
                ->nytClient
                ->getBestSellers($filters)
        )
            ->toCollection();
    }
}
