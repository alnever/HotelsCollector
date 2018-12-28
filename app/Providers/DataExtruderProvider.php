<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

use App\Library\Services\DataExtruderInterface;
use App\Library\Services\BookingExtruder;

class DataExtruderProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(DataExtruderInterface::class, function($app) {
          return new BookingExtruder(new Client(), new Crawler());
        });
    }
}
