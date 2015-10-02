# Larasquare

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


Simple and extensible Foursquare API PHP Client with Laravel Support based on Guzzle 6


## Install

Via Composer

``` bash
$ composer require iivannov/larasquare
```


## Laravel

To use the Laravel Facade you need to add the ServiceProvider and Facade classes in your `config\app.php`

``` php

'providers' => [
    ...

    Iivannov\Larasquare\Provider\LarasquareServiceProvider::class,
];

'aliases' => [
        ...

    'Larasquare' => Iivannov\Larasquare\Facade\Larasquare::class
    ];
```



## Usage

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email iivannov@gmail.com instead of using the issue tracker.

## Credits

- [Ivan Ivanov][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/iivannov/larasquare.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpiivannov/larasquare/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpiivannov/larasquare.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpiivannov/larasquare.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/iivannov/larasquare.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/iivannov/larasquare
[link-travis]: https://travis-ci.org/thephpiivannov/larasquare
[link-scrutinizer]: https://scrutinizer-ci.com/g/thephpiivannov/larasquare/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/thephpiivannov/larasquare
[link-downloads]: https://packagist.org/packages/iivannov/larasquare
[link-author]: https://github.com/iivannov
[link-contributors]: ../../contributors
