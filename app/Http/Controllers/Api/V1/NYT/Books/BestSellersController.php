<?php

namespace App\Http\Controllers\Api\V1\NYT\Books;

use App\Actions\NYT\BooksAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest;
use App\Http\Resources\Api\V1\NYT\Books\BestSellersResourceCollection;
use App\Support\DataTransferObjects\NYT\Books\BestSellersFilters;

class BestSellersController extends Controller
{
    public function __invoke(BestSellersRequest $request, BooksAction $booksAction)
    {
        return new BestSellersResourceCollection(
            $booksAction
                ->getBestSellers(BestSellersFilters::fromRequest($request))
        );
    }
}
