<?php

declare(strict_types=1);

namespace Tests\Feature\V1\NYT\Books;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

abstract class BooksTestCase extends TestCase
{
    protected array $successBodyResponse = [
        'status' => 'OK',
        'results' => [
            [
                'title' => 'I GIVE YOU MY BODY ...',
                'description' => 'The author of the Outlander novels gives tips on writing sex scenes, drawing on examples from the books.',
                'contributor' => 'by Diana Gabaldon',
                'author' => 'Diana Gabaldon',
                'contributor_note' => '',
                'price' => '0.00',
                'age_group' => '',
                'publisher' => 'Dell',
                'isbns' => [
                    [
                        'isbn10' => '0399178570',
                        'isbn13' => '9780399178573',
                    ],
                ],
                'ranks_history' => [
                    [
                        'primary_isbn10' => '0399178570',
                        'primary_isbn13' => '9780399178573',
                        'rank' => 8,
                        'list_name' => 'Advice How-To and Miscellaneous',
                        'display_name' => 'Advice, How-To & Miscellaneous',
                        'published_date' => '2016-09-04',
                        'bestsellers_date' => '2016-08-20',
                        'weeks_on_list' => 1,
                        'rank_last_week' => 0,
                        'asterisk' => 0,
                        'dagger' => 0,
                    ],
                ],
                'reviews' => [
                    [
                        'book_review_link' => '',
                        'first_chapter_link' => '',
                        'sunday_review_link' => '',
                        'article_chapter_link' => '',
                    ],
                ],
            ],
        ],
    ];

    protected array $errorResponseBody = [
        'status' => 'ERROR',
        'results' => []
    ];

    protected function fakeSuccesfullGetBestSellers()
    {
        Http::fake(
            [
                'https://api.nytimes.com/svc/books/v3/lists/best-sellers*' => Http::response(
                    $this->successBodyResponse,
                    200
                ),
            ]
        );
    }

    protected function fakeFailedGetBestSellers()
    {
        Http::fake(
            [
                'https://api.nytimes.com/svc/books/v3/lists/best-sellers*' => Http::response(
                    $this->errorResponseBody,
                    500
                ),
            ]
        );
    }
}
