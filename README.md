# Laravel Str Helper

A package that extends `\Illuminate\Support\Str` with additional string helpers

## Installation

Via Composer

```bash
composer require boomdraw/laravel-dotenv
```

The package will automatically register itself.

## Usage and methods

```php
use Illuminate\Support\Str;
```

### between

The function returns the portion of the string specified by the start and end parameters.

```php
Str::between(string $string, string $start, string $end, bool $strict = true)
```

The function returns string between `$start` and `$end`.

```php
Str::between('foo bar baz', 'foo ', ' baz') === 'bar'
```

The function returns `false` if `$strict = true` and `$start` or `$end` is missing in the `$string`.

```php
Str::between('foo bar baz', 'test ', ' test') === false
```

```php
Str::between('foo bar baz', 'foo ', ' test') === false
```

```php
Str::between('foo bar baz', 'test ', ' baz') === false
```

For the disabled strict mode result will be:

- source `$string` if `$start` and `$end` are missing in the `$string`.

```php
Str::between('foo bar baz', 'test ', ' test', false) === 'foo bar baz'
```

- source `$string` before `$end` if `$start` is missing in the `$string`.

```php
Str::between('foo bar baz', 'test ', ' baz', false) === 'foo bar'
```

- source `$string` after `$start` if `$end` is missing in the `$string`.

```php
Str::between('foo bar baz', 'foo ', ' test', false) === 'bar baz'
```

### wbetween

The function returns the portion of the string specified by the start and end parameters wrapped with those parameters.

```php
Str::wbetween(string $string, string $start, string $end, bool $strict = true)
```

The function returns string between `$start` and `$end` wrapped with `$start` and `$end`.

```php
Str::wbetween('goo foo bar baz haz', 'foo ', ' baz') === 'foo bar baz'
```

The function returns `false` if `$strict = true` and `$start` or `$end` is missing in the `$string`.

```php
Str::wbetween('goo foo bar baz haz', 'test ', ' test') === false
```

```php
Str::wbetween('goo foo bar baz haz', 'foo ', ' test') === false
```

```php
Str::wbetween('goo foo bar baz haz', 'test ', ' baz') === false
```

For the disabled strict mode result will be:

- source `$string` if `$start` and `$end` are missing in the `$string`.

```php
Str::wbetween('goo foo bar baz haz', 'test ', ' test', false) === 'goo foo bar baz haz'
```

- source `$string` without substring after `$end` if `$start` is missing in the `$string`.

```php
Str::wbetween('goo foo bar baz haz', 'test ', ' baz', false) === 'goo foo bar baz'
```

- source `$string` without substring before `$start` if `$end` is missing in the `$string`.

```php
Str::wbetween('goo foo bar baz haz', 'foo ', ' test', false) === 'foo bar baz haz'
```

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit
```

## Security

If you discover any security-related issues, please email [pkgsecurity@boomdraw.com](mailto:pkgsecurity@boomdraw.com) instead of using the issue tracker.

## License

[MIT](http://opensource.org/licenses/MIT)
