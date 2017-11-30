# data-structure

[![Build Status](https://travis-ci.org/localheinz/data-structure.svg?branch=master)](https://travis-ci.org/localheinz/data-structure)
[![codecov](https://codecov.io/gh/localheinz/data-structure/branch/master/graph/badge.svg)](https://codecov.io/gh/localheinz/data-structure)
[![Latest Stable Version](https://poser.pugx.org/localheinz/data-structure/v/stable)](https://packagist.org/packages/localheinz/data-structure)
[![Total Downloads](https://poser.pugx.org/localheinz/data-structure/downloads)](https://packagist.org/packages/localheinz/data-structure)

This package provides implementations of data structures.

## Installation

Run

```
$ composer require localheinz/data-structure
```

## Data Structures

* `Localheinz\DataStructure\Queue`
* `Localheinz\DataStructure\Stack`

### Queue

```php
use Localheinz\DataStructure\Queue;

$queue = new Queue();

$queue->isEmpty(); // true
$queue->isFull(); // false

$queue->enqueue('foo');
$queue->enqueue('bar');
$queue->isEmpty(); // false
$queue->isFull(); // false

$queue->dequeue(); // 'foo'
$queue->dequeue(); // 'bar'
$queue->isEmpty(); // true
$queue->isFull(); // false

$maxSize = 1;

$anotherQueue = new Queue($maxSize);

$anotherQueue->enqueue('foo');
$anotherQueue->isFull(); // true
```

### Stack

```php
use Localheinz\DataStructure\Stack;

$stack = new Stack();

$stack->isEmpty(); // true
$stack->isFull(); // false

$stack->push('foo');
$stack->push('bar');
$stack->isEmpty(); // false
$stack->isFull(); // false

$stack->peek(); // 'bar'

$stack->pop(); // 'bar'
$stack->pop(); // 'foo'
$stack->isEmpty(); // true
$stack->isFull(); // false

$maxSize = 1;

$anotherStack = new Stack($maxSize);

$anotherStack->push('foo');
$anotherStack->isFull(); // true
```

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
