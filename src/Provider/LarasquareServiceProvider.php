<?php

namespace Iivannov\Larasquare\Provider;

use Iivannov\Larasquare\Foursquare;
use Illuminate\Support\ServiceProvider;

class LarasquareServiceProvider extends ServiceProvider {


    public function register()
    {
        $this->app->singleton('larasquare', function($app) {
            return new Foursquare(config('services.foursquare'));
        });

    }
}