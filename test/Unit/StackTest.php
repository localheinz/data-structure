<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @link https://github.com/localheinz/data-structure
 */

namespace Localheinz\DataStructure\Test\Unit;

use Localheinz\DataStructure\Stack;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class StackTest extends Framework\TestCase
{
    use Helper;

    public function testConstructorRejectsInvalidSize()
    {
        $size = -1;

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(\sprintf(
            'Size needs to be equal to or greater than 0, but %d is not.',
            $size
        ));

        new Stack($size);
    }

    public function testDefaults()
    {
        $stack = new Stack();

        $this->assertTrue($stack->isEmpty());
        $this->assertFalse($stack->isFull());
    }

    public function testPushThrowsBadMethodCallExceptionIfStackIsFull()
    {
        $element = 'foo';

        $stack = new Stack(0);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot push element onto full stack.');

        $stack->push($element);
    }

    public function testPushPushesElementOntoStack()
    {
        $element = 'foo';

        $stack = new Stack();

        $stack->push($element);

        $this->assertFalse($stack->isEmpty());
    }

    public function testPopThrowsBadMethodCallExceptionIfStackIsEmpty()
    {
        $stack = new Stack();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot pop element from empty stack.');

        $stack->pop();
    }

    public function testPopRemovesTopMostElementFromStackAndReturnsIt()
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $stack = new Stack();

        $stack->push($elementOne);
        $stack->push($elementTwo);

        $this->assertSame($elementTwo, $stack->pop());
        $this->assertSame($elementOne, $stack->pop());
        $this->assertTrue($stack->isEmpty());
    }

    public function testPeekThrowsBadMethodCallExceptionIfStackIsEmpty()
    {
        $stack = new Stack();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot peek into empty stack.');

        $stack->peek();
    }

    public function testPeekReturnsTopMostElementFromStackButDoesNotRemoveIt()
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $stack = new Stack();

        $stack->push($elementOne);
        $stack->push($elementTwo);

        $this->assertSame($elementTwo, $stack->peek());
        $this->assertSame($elementTwo, $stack->peek());
    }
}
