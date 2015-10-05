# Larasquare

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](license.md)
[![Total Downloads][ico-downloads]][link-downloads]


Simple and extensible Foursquare API PHP Client with Laravel Facade and ServiceProvider based on Guzzle 6
Currently it supports only userless endpoint requests.


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

You need to add your Foursquare client ID and secret in `config\services.php`

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

$venues = $foursquare->venues($searchQuery);
```

## Query filters

If you need to generate, filter or transform your search query you can extract all the logic in a separate class that implements the `Iivannov\Larasquare\Filter\FilterContract`
and then just inject it with `setFilter()` method.

```php
$venues = Larasquare::setFilter(new MyFilter())->venues();
```

Put your filter logic in the parse() method. It will automatically receive the query passed in the search methods.
You can overwrite values, generate values from your custom array or whatever you need. The returned array will be sent with the Foursquare request.
```php

/**
* Generate, transform or filter your search query
*
* @param $query
* @return array
*/
public function parse($query = [])
{
    return [
        'll' => $query['location']['lat'] . ',' . $query['location']['lon'],
        'query' => $query['searchTerm'],
        'near' => $_GET['nearLocation'],
        'radius' => 200
    ];
}
```

Methods
--------
** Endpoints not covered by this library **
You can use the `request` method to query a Foursquare endpoint.

```php
// get venue photos
$response = Larasquare::request("venues/$venueId/photos")

// get details about a tip,
$response = Larasquare::request("tips/$tipId")
```


** Searching Venues **

```php
//Laravel
$venues = Larasquare::venues($query);
```

** Get a single venue **

```php
$venues = Larasquare::venue($venueId);
```

** Other venues methods **

```php
// get suggestion @see https://developer.foursquare.com/docs/venues/suggestcompletion
$venues = Larasquare::suggest($searchQuery);

// get trending @see https://developer.foursquare.com/docs/venues/trending
$venues = Larasquare::trending($searchQuery);
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
