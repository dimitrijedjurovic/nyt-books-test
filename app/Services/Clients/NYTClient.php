<?php

namespace App\Services\Clients;

use App\Support\DataTransferObjects\NYT\Books\BestSellersFilters;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NYTClient
{

    public function __construct(protected PendingRequest $client)
    {
    }

    public function getBestSellers(BestSellersFilters $filters)
    {
        $response = $this->client->get('svc/books/v3/lists/best-sellers/history.json', $filters);

        $responseData = json_decode($response, true);

        if ($responseData['status'] == 'ERROR') {
            throw new HttpResponseException(response('NTY service error', 500));
        }

        return $responseData['results'];
    }
}
