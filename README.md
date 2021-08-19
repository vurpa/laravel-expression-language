# A simple wrapper around Symfony ExpressionLanguage component for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vurpa/laravel-expression-language.svg?style=flat-square)](https://packagist.org/packages/vurpa/laravel-expression-language)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vurpa/laravel-expression-language/run-tests?label=tests)](https://github.com/vurpa/laravel-expression-language/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vurpa/laravel-expression-language/Check%20&%20fix%20styling?label=code%20style)](https://github.com/vurpa/laravel-expression-language/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/vurpa/laravel-expression-language.svg?style=flat-square)](https://packagist.org/packages/vurpa/laravel-expression-language)

> The ExpressionLanguage component provides an engine that can compile and evaluate expressions. An expression is a one-liner that returns a value (mostly, but not limited to, Booleans).

## Installation

You can install the package via composer:

```bash
composer require vurpa/laravel-expression-language
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Vurpa\ExpressionLanguage\ExpressionLanguageServiceProvider" --tag="expression-language-config"
```

This is the contents of the published config file:

```php
return [
    'cache_store' => 'default',
];
```

## Usage

```php
use Vurpa\ExpressionLanguage\Facades\ExpressionLanguage;


ExpressionLanguage::evaluate('1 + 2') // 3
ExpressionLanguage::compile('1 + 2') // (1 + 2)
```
## Validation rules

### `ExpressionSyntax`

The field under validation must have valid expression syntax.

```php
// in a `FormRequest`

use Vurpa\ExpressionLanguage\Rules\ExpressionSyntax;

public function rules()
{
    return [
        'expression' => [new ExpressionSyntax()],
    ];
}
```

By default, the rule accepts any variable names in the expression. You can set a list of acceptable names:

```php
use Vurpa\ExpressionLanguage\Rules\ExpressionSyntax;

new ExpressionSyntax(['foo' => 5, 'bar' => 10]);
```

* `'foo < bar'` passes
* `'score > minimum_score'` fails

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [John](https://github.com/vurpa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
