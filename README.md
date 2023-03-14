# "Supervisord Monitor CLI"

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/supervisord-monitor-cli.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/supervisord-monitor-cli)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require concept7/supervisord-monitor-cli
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="supervisord-monitor-cli-config"
```

This is the contents of the published config file:

```php
return [
    'protocol' => 'https',
    'host' => env('SUPERVISORD_MONITOR_HOST', ''),
    'path' => env('SUPERVISORD_MONITOR_PATH', ''),
    'basic_auth' => [
        'username' => env('SUPERVISORD_MONITOR_BASIC_AUTH_USERNAME', ''),
        'password' => env('SUPERVISORD_MONITOR_BASIC_AUTH_PASSWORD', ''),
    ],
    'daemon_names' => env('SUPERVISORD_MONITOR_DAEMON_NAMES', ''),
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martijn Wagena](https://github.com/martijn@concept7.nl)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
