<?php

declare(strict_types=1);

namespace App\Support\DataTransferObjects\NYT\Books;

use Spatie\LaravelData\Data;

class BestSellerItem extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $author,
        public array $isbns,
        public ?string $publisher,
        public ?string $price,
    ) {
    }
}
