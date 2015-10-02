# Larasquare

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](license.md)
[![Total Downloads][ico-downloads]][link-downloads]


Simple and extensible Foursquare API PHP Client with Laravel Support based on Guzzle 6


## Install

Via Composer

``` bash
$ composer require iivannov/larasquare
```




## Usage with Laravel

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

You need to add your Foursquare client ID and secret in `config\app.php`

``` php
'foursquare' => [
    'clientId' => YOUR_FOURSQUARE_CLIENT_ID,
    'clientSecret' => YOUR_FOURSQUARE_CLIENT_SECRET
]
```

After this you can directly use the Laravel Facade


``` php

    $venues = Larasquare::venues($searchQuery);

```


## Standard Usage

``` php
    $config = [
        clientId = YOUR_FOURSQUARE_CLIENT_ID,
        clientSecretT = YOUR_FOURSQUARE_CLIENT_SECRET,
        apiUrl = FOURSQUARE_API_URL, //optional
        version = SUPPORTED_VERSION, //optional, format: YYYYMMDD
    ];

    $foursquare = new Foursquare($config);

    $venues = Larasquare::venues($searchQuery);

```



## License

The MIT License (MIT). Please see [License File](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/iivannov/larasquare.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/iivannov/larasquare.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/iivannov/larasquare
[link-downloads]: https://packagist.org/packages/iivannov/larasquare
[link-author]: https://github.com/iivannov
[link-contributors]: ../../contributors
