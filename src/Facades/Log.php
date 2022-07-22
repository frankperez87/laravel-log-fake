<?php

namespace frankperez87\LaravelLogFake\Facades;

use frankperez87\LaravelLogFake\LogFake as LaravelLogFake;
use Illuminate\Support\Facades\Facade;

/**
 * @see \Illuminate\Log\Logger
 */
class Log extends Facade
{
    public static function fake()
    {
        static::swap($fake = new LaravelLogFake);

        return $fake;
    }

    protected static function getFacadeAccessor()
    {
        return 'log';
    }
}
