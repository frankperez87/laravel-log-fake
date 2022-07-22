<?php

namespace frankperez87\LaravelLogFake\Facades;

use Illuminate\Support\Facades\Facade;
use frankperez87\LaravelLogFake\LogFake as LaravelLogFake;

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
