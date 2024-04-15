<p align="center">
<img src="./docs/logo-cover.png" style="width: 500px; border-radius: 12px; margin: 20px; box-shadow: 5px 5px 20px rgb(45 114 253);" >
</p>

# MingleJS

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ijpatricio/mingle.svg?style=flat-square)](https://packagist.org/packages/ijpatricio/mingle)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ijpatricio/mingle/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ijpatricio/mingle/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ijpatricio/mingle/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ijpatricio/mingle/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ijpatricio/mingle.svg?style=flat-square)](https://packagist.org/packages/ijpatricio/mingle)

As you may already know, [Livewire](https://livewire.laravel.com/) is a full-stack framework for [Laravel](https://laravel.com/) that allows you to build dynamic interfaces using server-side code.
MingleJS allows you to use React/Vue components in your Livewire application, so you can use the best of both worlds.

## How is it working?

MingleJS renders a `div` on the server-side, and then mounts the React/Vue component on the client-side. Each JS component is rendered by a Livewire compoenent, so you get an island of interactivity in your Livewire application, with the JS of your taste.

![Browser with stack of divs and a Mingle](docs/img_1.png)

## Some included nicety features

In the backend component, you can pass data that the component will have access to on the frontend.

You can choose to keep using Ajax client - Axios/Fetch/etc.
But the reality is, for the most part, you can use the convenient way of making server actions, which is Livewire. You get to make server requests just by `$wire.addTodo(todo)`. Find below a simple diagram of how MingleJS works in a page.

![Browser and server showing how they interact winthin a Mingle](docs/img_2.png)

## Getting started & Documentation

You'll find how to get started and the documentation [here](https://minglejs.unitedbycode.com).

For any questions and suggestions regarding MingleJS, feel free to [create an issue on GitHub](https://github.com/ijpatricio/mingle/issues).

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Joao Patricio](https://github.com/ijpatricio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
