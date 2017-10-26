# Circular Array

[![Build Status](https://goo.gl/7P7C7S)](https://travis-ci.org/PHPSnippets/CircularArray)
[![Minimum PHP Version](https://goo.gl/D13jNg)](https://php.net/)
[![Packagist](https://goo.gl/zvn8FH)](https://packagist.org/packages/PHPSnippets/CircularArray)
[![Coverage Status](https://goo.gl/25u9F4)](https://scrutinizer-ci.com/g/PHPSnippets/CircularArray/code-structure)
[![Quality Score](https://goo.gl/RXk1Jy)](https://scrutinizer-ci.com/g/PHPSnippets/CircularArray)
[![Software License](https://goo.gl/QHtnq5)](LICENSE.md)

Fixed Circular Array

## Install

Via Composer

``` bash
$ composer require php-snippets/circular-array
```

## Usage

![](https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Circular_buffer_-_6789345.svg/500px-Circular_buffer_-_6789345.svg.png)

From [Wikipedia](https://en.wikipedia.org/wiki/Circular_buffer):

>A circular buffer, circular queue, cyclic buffer or ring buffer is a data structure that uses a single, 
>fixed-size buffer as if it were connected end-to-end. 
>This structure lends itself easily to buffering data streams.

You can create an array where an interaction occurs indefinitely:

```php
use PHPSnippets\DataStructures\CircularArray;

$circular = Circular::fromArray(array(1, 2, 3, 4));

// this foreach never ends, after 4 back to 1.
foreach($circular as $value){
    echo $value;
}
```

## Requirements

The following versions of PHP are supported by this version.

* PHP >= 5.3

## Testing

``` bash
$ composer qa:paratest
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Credits

- [Webysther Nunes](https://github.com/Webysther)
- [All Contributors](https://github.com/PHPSnippets/CircularArray/scontributors)

## License

MIT. Please see [License File](LICENSE.md) for more information.
