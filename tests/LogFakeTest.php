<?php

use frankperez87\LaravelLogFake\Facades\Log;

it('can assert correct context exists', function () {
    Log::fake();

    logger()->withContext([
        'yay' => 'it works',
    ]);

    Log::assertContext(function ($context) {
        return $context == ['yay' => 'it works'];
    });
});

it('can assert log is logged', function () {
    Log::fake();

    logger()->emergency('this is a emergency log');
    logger()->alert('this is a alert log');
    logger()->critical('this is a critical log');
    logger()->error('this is a error log');
    logger()->warning('this is a warning log');
    logger()->notice('this is a notice log');
    logger()->info('this is a info log');
    logger()->debug('this is a debug log');

    logger()->log('arbitrary', 'this is a arbitrary log');

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'emergency' &&
            $log['message'] == 'this is a emergency log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'alert' &&
            $log['message'] == 'this is a alert log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'critical' &&
            $log['message'] == 'this is a critical log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'error' &&
            $log['message'] == 'this is a error log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'warning' &&
            $log['message'] == 'this is a warning log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'notice' &&
            $log['message'] == 'this is a notice log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'info' &&
            $log['message'] == 'this is a info log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'debug' &&
            $log['message'] == 'this is a debug log';
    });

    Log::assertLogged(function ($log) {
        return
            $log['level'] == 'arbitrary' &&
            $log['message'] == 'this is a arbitrary log';
    });
});

it('can assert log is logged using helper', function () {
    Log::fake();

    logger()->emergency('this is a emergency log');

    logger()->assertLogged(function ($log) {
        return
            $log['level'] == 'emergency' &&
            $log['message'] == 'this is a emergency log';
    });
});
