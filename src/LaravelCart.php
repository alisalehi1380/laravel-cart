<?php

namespace Binafy\LaravelCart;

use Illuminate\Support\Facades\Facade;

class LaravelCart extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-cart';
    }
}
