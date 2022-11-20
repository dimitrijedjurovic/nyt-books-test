<?php

namespace App\Providers;

use App\Services\Clients\NYTClient;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class NYTServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            NYTClient::class,
            function () {
                return new NYTClient(
                    Http::withOptions(
                        [
                            'query' => ['api-key' => config('nyt.key')],
                        ]
                    )
                        ->baseUrl('https://api.nytimes.com/')
                );
            }
        );
    }
}
