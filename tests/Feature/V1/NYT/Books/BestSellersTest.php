<?php

declare(strict_types=1);

namespace Tests\Feature\V1\NYT\Books;

class BestSellersTest extends BooksTestCase
{
    protected string $routeName = 'nyt.best-sellers';

    protected array $expectedResponseStructure = [
      'data' => [
          [
              'title',
              'price',
              'author',
              'isbns',
              'publisher',
          ]
      ]
    ];
    /**
     * @test
     * @covers \App\Http\Controllers\Api\V1\NYT\Books\BestSellersController
     * @covers \App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest
     * @covers \App\Support\DataTransferObjects\NYT\Books\BestSellersFilters
     */
    public function itReturnsTheCorrectData()
    {
        $this->fakeSuccesfullGetBestSellers();

        $response = $this->get(route($this->routeName));

        $response
            ->assertStatus(200)
            ->assertJsonStructure($this->expectedResponseStructure);
    }

    /**
     * @test
     * @covers \App\Http\Controllers\Api\V1\NYT\Books\BestSellersController
     * @covers \App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest
     * @covers \App\Support\DataTransferObjects\NYT\Books\BestSellersFilters
     */
    public function itReturnsSuccessResponseWhenProvidedDataIsValid(): void
    {
        $this->fakeSuccesfullGetBestSellers();

        $response = $this->get(
            route(
                $this->routeName,
                [
                    'isbn' => ['0123456789', '0123456789123'],
                    'offset' => 40,
                    'title' => 'Title',
                    'author' => 'Author',
                ]
            )
        );

        $response->assertStatus(200);
    }

    /**
     * @test
     * @covers \App\Http\Controllers\Api\V1\NYT\Books\BestSellersController
     * @covers \App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest
     * @covers \App\Support\DataTransferObjects\NYT\Books\BestSellersFilters
     */
    public function itReturnsUnprocessableEntityResponseWhenProvidedDataIsInvalid(): void
    {
        $this->fakeSuccesfullGetBestSellers();

        $response = $this->get(
            route(
                $this->routeName,
                [
                    'isbn' => ['0123456789', 'aaa', '0123456789123'],
                    'offset' => 19,
                ]
            )
        );

        $response->assertStatus(302)
            ->assertInvalid(
                [
                    'isbn.1',
                    'offset',
                ],
            );
    }

    /**
     * @test
     * @covers \App\Http\Controllers\Api\V1\NYT\Books\BestSellersController
     * @covers \App\Http\Requests\Api\V1\NYT\Books\BestSellersRequest
     * @covers \App\Support\DataTransferObjects\NYT\Books\BestSellersFilters
     */
    public function itThrowsExceptionWhenNYTFails(): void
    {
        $this->fakeFailedGetBestSellers();

        $response = $this->get(
            route($this->routeName)
        );

        $response->assertStatus(500)
            ->assertContent('NTY service error');
    }
}
