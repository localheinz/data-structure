<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/data-structure
 */

namespace Localheinz\DataStructure\Test\Unit;

use Localheinz\DataStructure\Stack;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\DataStructure\Stack
 */
final class StackTest extends Framework\TestCase
{
    use Helper;

    public function testConstructorRejectsInvalidSize(): void
    {
        $size = -1;

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(\sprintf(
            'Size needs to be equal to or greater than 0, but %d is not.',
            $size
        ));

        new Stack($size);
    }

    public function testDefaults(): void
    {
        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        self::assertTrue($stack->isEmpty());
        self::assertFalse($stack->isFull());
    }

    public function testPushThrowsBadMethodCallExceptionIfStackIsFull(): void
    {
        $element = 'foo';

        $stack = new Stack(0);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot push element onto full stack.');

        $stack->push($element);
    }

    public function testPushPushesElementOntoStack(): void
    {
        $element = 'foo';

        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        $stack->push($element);

        self::assertFalse($stack->isEmpty());
    }

    public function testPopThrowsBadMethodCallExceptionIfStackIsEmpty(): void
    {
        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot pop element from empty stack.');

        $stack->pop();
    }

    public function testPopRemovesTopMostElementFromStackAndReturnsIt(): void
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        $stack->push($elementOne);
        $stack->push($elementTwo);

        self::assertSame($elementTwo, $stack->pop());
        self::assertSame($elementOne, $stack->pop());
        self::assertTrue($stack->isEmpty());
    }

    public function testPeekThrowsBadMethodCallExceptionIfStackIsEmpty(): void
    {
        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot peek into empty stack.');

        $stack->peek();
    }

    public function testPeekReturnsTopMostElementFromStackButDoesNotRemoveIt(): void
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $size = $this->faker()->numberBetween(1);

        $stack = new Stack($size);

        $stack->push($elementOne);
        $stack->push($elementTwo);

        self::assertSame($elementTwo, $stack->peek());
        self::assertSame($elementTwo, $stack->peek());
    }
}
