# Luhn Algorithm

[![PHP Tests & Lint](https://github.com/Horat1us/luhn-algorithm/actions/workflows/php.yml/badge.svg)](https://github.com/Horat1us/luhn-algorithm/actions/workflows/php.yml)

This is a zero dependency implementation of the Luhn Algorithm for PHP 7.4 and above. The Luhn Algorithm is used to validate things like credit cards and national identification numbers. More information on the algorithm can be found at [Wikipedia](http://en.wikipedia.org/wiki/Luhn_algorithm).

This is fork of [Ekman/luhn-algorithm](https://github.com/Ekman/luhn-algorithm) with PHP 8.4 compatibility fix.

## Installation

Install with [Composer](https://getcomposer.org/):

```bash
composer require horat1us/luhn-algorithm:^6.0
```

## Usage

In order to instantiate a new instance of the library, use the factory:

 ```php
 use Nekman\LuhnAlgorithm\LuhnAlgorithmFactory;

 $luhn = LuhnAlgorithmFactory::create();
 ```

You can find [the library facade in the `LuhnAlgorithmInterface.php` file](src/Contract/LuhnAlgorithmInterface.php).

[The `Number` class](src/Number.php) is a container class that holds the actual number and the check digit. It does no validation nor does it calculate the check digit. It exists to clearly separate the number from the check digit and to define when the check digit exists or not. To simplify the process of validating a number you can use the named constructor `Number::fromString()` like this:

```php
use Nekman\LuhnAlgorithm\Number;

// Assume $creditCard is from a form.
$number = Number::fromString($creditCard);

if ($luhn->isValid($number)) {
    // Number is valid.
}
```

Alternatively, if you want to calculate the checksum or check digit for a number:

```php
use Nekman\LuhnAlgorithm\Number;

$number = new Number(12345);

$checksum = $luhn->calcChecksum($number);

$checkDigit = $luhn->calcCheckDigit($number);
```

## Versioning

This project complies with [Semantic Versioning](https://semver.org/).

## Changelog

For a complete list of changes, and how to migrate between major versions, see [releases page](https://github.com/horat1us/luhn-algorithm/releases).
