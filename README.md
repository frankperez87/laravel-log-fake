# Laravel Log Fake

[![Latest Version on Packagist](https://img.shields.io/packagist/v/frankperez87/laravel-log-fake.svg?style=flat-square)](https://packagist.org/packages/frankperez87/laravel-log-fake)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/frankperez87/laravel-log-fake/run-tests?label=tests)](https://github.com/frankperez87/laravel-log-fake/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/frankperez87/laravel-log-fake/Check%20&%20fix%20styling?label=code%20style)](https://github.com/frankperez87/laravel-log-fake/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/frankperez87/laravel-log-fake.svg?style=flat-square)](https://packagist.org/packages/frankperez87/laravel-log-fake)

This package allows you to easily test the Laravel Log functionality.

## Supported Versions

We currently support the following Laravel versions.

| Version | Supported          |
| ------- | ------------------ |
| 8.x   | :white_check_mark: |
| 9.x  | :white_check_mark: |

## Installation

You can install the package via composer:

```bash
composer require frankperez87/laravel-log-fake
```

## Usage

```php
use frankperez87\LaravelLogFake\Facades\Log;

Log::fake();

logger()->withContext([
    'yay' => 'it works',
]);

logger()->info('this is a info log');

# You can use the helpers via the Facade
Log::assertContext(function ($context) {
    return $context == ['yay' => 'it works'];
});

Log::assertLogged(function ($log) {
    return
        $log['level'] == 'emergency' &&
        $log['message'] == 'this is a emergency log';
});

# You can also use the helper instead
logger()->assertContext(function ($context) {
    return $context == ['yay' => 'it works'];
});

logger()->assertLogged(function ($log) {
    return
        $log['level'] == 'emergency' &&
        $log['message'] == 'this is a emergency log';
});
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/:author_username/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Frank Perez](https://github.com/frankperez87)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
