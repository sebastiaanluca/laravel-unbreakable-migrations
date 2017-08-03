# Laravel Unbreakable Migrations

[![Latest stable release][version-badge]][link-packagist]
[![Software license][license-badge]](LICENSE.md)
[![Build status][travis-badge]][link-travis]
[![Total downloads][downloads-badge]][link-packagist]

[![Read my blog][blog-link-badge]][link-blog]
[![View my other packages and projects][packages-link-badge]][link-packages]
[![Follow @sebastiaanluca on Twitter][twitter-profile-badge]][link-twitter]
[![Share this package on Twitter][twitter-share-badge]][link-twitter-share]

__Prevent your Laravel database migrations from failing by wrapping them in transactions.__

## Table of contents

* [Requirements](#requirements)
* [How to install](#how-to-install)
    + [Laravel 5.5](#laravel-55)
    + [Laravel 5.4](#laravel-54)
* [How to use](#how-to-use)
* [License](#license)
* [Change log](#change-log)
* [Testing](#testing)
* [Contributing](#contributing)
* [Security](#security)
* [Credits](#credits)
* [About](#about)

## Requirements

- PHP 7.1 or higher
- Laravel 5.4 or higher

## How to install

### Laravel 5.5

From Laravel 5.5 and onwards, this package supports auto-discovery. Just add the package to your project using composer and you're good to go!

```bash
composer require sebastiaanluca/laravel-unbreakable-migrations
```

### Laravel 5.4

Install the package through Composer by using the following command:

```bash
composer require sebastiaanluca/laravel-unbreakable-migrations
```

Add the service provider to the `providers` array in your `config/app.php` file:

```php
'providers' => [

    SebastiaanLuca\Migrations\Providers\UnbreakableMigrationsServiceProvider::class,

]
```

## How to use

### Generating migrations

### Unbreakable migrations in detail

- `migrateUp`
- `migrateDown`
- `$tables`
- `drop`
- `dropAllTables`
- `dropColumn`
- `tableExists`
- …

### Transactional migration

## License

This package operates under the MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.

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

If you discover any security related issues, please email [hello@sebastiaanluca.com][link-author-email] instead of using the issue tracker.

## Credits

- [Sebastiaan Luca][link-github-profile]
- [All Contributors][link-contributors]

## About

My name is Sebastiaan and I'm a freelance Laravel developer specializing in building custom Laravel applications. Check out my [portfolio][link-portfolio] for more information, [my blog][link-blog] for the latest tips and tricks, and my other [packages][link-packages] to kick-start your next project.

Have a project that could use some guidance? Send me an e-mail at [hello@sebastiaanluca.com][link-author-email]!

[version-badge]: https://poser.pugx.org/sebastiaanluca/laravel-unbreakable-migrations/version
[license-badge]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[travis-badge]: https://img.shields.io/travis/sebastiaanluca/laravel-unbreakable-migrations/master.svg
[downloads-badge]: https://img.shields.io/packagist/dt/sebastiaanluca/laravel-unbreakable-migrations.svg

[blog-link-badge]: https://img.shields.io/badge/link-blog-lightgrey.svg
[packages-link-badge]: https://img.shields.io/badge/link-other_packages-lightgrey.svg
[twitter-profile-badge]: https://img.shields.io/twitter/follow/sebastiaanluca.svg?style=social
[twitter-share-badge]: https://img.shields.io/twitter/url/http/shields.io.svg?style=social

[link-packagist]: https://packagist.org/packages/sebastiaanluca/laravel-unbreakable-migrations
[link-travis]: https://travis-ci.org/sebastiaanluca/laravel-unbreakable-migrations
[link-contributors]: ../../contributors

[link-portfolio]: https://www.sebastiaanluca.com
[link-blog]: https://blog.sebastiaanluca.com
[link-packages]: https://packagist.org/packages/sebastiaanluca
[link-twitter]: https://twitter.com/sebastiaanluca
[link-twitter-share]: https://twitter.com/intent/tweet?text=Prevent%20your%20Laravel%20database%20migrations%20from%20failing%20by%20wrapping%20them%20in%20transactions.%20https%3A%2F%2Fgithub.com%2Fsebastiaanluca%2Flaravel-unbreakable-migrations%20via%20%40sebastiaanluca&source=webclient
[link-github-profile]: https://github.com/sebastiaanluca
[link-author-email]: mailto:hello@sebastiaanluca.com
