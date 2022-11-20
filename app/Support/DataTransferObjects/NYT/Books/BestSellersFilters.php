<?php

declare(strict_types=1);

namespace App\Support\DataTransferObjects\NYT\Books;

use App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest;
use Spatie\LaravelData\Data;

class BestSellersFilters extends Data
{
    public ?string $title;

    public ?string $author;

    public ?string $isbn;

    public ?int $offset;

    public function __construct(array $data)
    {
        $this->title = $data['title'] ?? null;
        $this->author = $data['author'] ?? null;
        $this->isbn = $data['isbn'] ?? null;
        $this->offset = $data['offset'] ?? null;
    }

    public static function fromRequest(BestSellersRequest $request)
    {
        $queryParams = $request->validated();

        if (array_key_exists('isbn', $queryParams)) {
            $queryParams['isbn'] = implode(';', $queryParams['isbn']);
        }

        return new self($queryParams);
    }
}
