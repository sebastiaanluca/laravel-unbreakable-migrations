# Laravel Unbreakable Migrations

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

[![Follow me on Twitter](https://img.shields.io/twitter/follow/sebastiaanluca.svg?style=social)](https://twitter.com/sebastiaanluca)
[![Share this package on Twitter](https://img.shields.io/twitter/url/http/shields.io.svg?style=social)](https://twitter.com/home?status=https%3A//github.com/sebastiaanluca/php-stub-generator%20via%20%40sebastiaanluca)

Prevent your Laravel database migrations from failing by wrapping them in transactions.

## Install

Via Composer

``` bash
composer require sebastiaanluca/laravel-unbreakable-migrations
```

And add the service provider to your providers array in `config/app.php` if you want to make use of the generate commands (completely optional):

``` php
SebastiaanLuca\Migrations\Providers\UnbreakableMigrationServiceProvider::class,
```

## Usage

### Generating migrations

### Migration

- `drop`
- `dropColumn`
- …

### Transactional migration

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
composer install
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@sebastiaanluca.com instead of using the issue tracker.

## Credits

- [Sebastiaan Luca][link-author]
- [All Contributors][link-contributors]

## About

My name is Sebastiaan and I'm a freelance back-end developer specializing in building high-end, custom Laravel applications. Check out my [portfolio][author-portfolio] for more information and my other [packages](https://github.com/sebastiaanluca?tab=repositories) to kick-start your next project. Have a project that could use some guidance? Send me an e-mail at [hello@sebastiaanluca.com][author-email]!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sebastiaanluca/laravel-unbreakable-migrations.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sebastiaanluca/laravel-unbreakable-migrations/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sebastiaanluca/laravel-unbreakable-migrations.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/sebastiaanluca/laravel-unbreakable-migrations
[link-travis]: https://travis-ci.org/sebastiaanluca/laravel-unbreakable-migrations
[link-downloads]: https://packagist.org/packages/sebastiaanluca/laravel-unbreakable-migrations
[link-contributors]: ../../contributors
[link-author]: https://github.com/sebastiaanluca
[author-portfolio]: http://www.sebastiaanluca.com
[author-email]: mailto:hello@sebastiaanluca.com
