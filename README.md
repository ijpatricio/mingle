# This is my package mingle

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ijpatricio/mingle.svg?style=flat-square)](https://packagist.org/packages/ijpatricio/mingle)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ijpatricio/mingle/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ijpatricio/mingle/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ijpatricio/mingle/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ijpatricio/mingle/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ijpatricio/mingle.svg?style=flat-square)](https://packagist.org/packages/ijpatricio/mingle)

This is a way of using Vue/React components in a Laravel Livewire app.

It's very different from an SPA or Inertia, because we can use Livewire, Alpine, Vue and React, in the same app.

This is very convenient because, for example:
- we want to use a couple of Vue components on an individual marketing page
- on another one we want to use React because of a specific component
- also we want to use Livewire on another

Well now you can.

Most likely you will pair Livewire with just one taste of JS framework, but you can mix and match as you wish.

## Installation

You can install the package via composer:

```bash
composer require ijpatricio/mingle
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="mingle-config"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Joao Patricio](https://github.com/ijpatricio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
