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

use Localheinz\DataStructure\Queue;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\DataStructure\Queue
 */
final class QueueTest extends Framework\TestCase
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

        new Queue($size);
    }

    public function testDefaults(): void
    {
        $size = $this->faker()->numberBetween(1);

        $queue = new Queue($size);

        self::assertTrue($queue->isEmpty());
        self::assertFalse($queue->isFull());
    }

    public function testQueueThrowsBadMethodCallExceptionIfQueueIsFull(): void
    {
        $element = 'foo';

        $queue = new Queue(0);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot queue element into full queue.');

        $queue->enqueue($element);
    }

    public function testQueueAddsElementToQueue(): void
    {
        $element = 'foo';

        $size = $this->faker()->numberBetween(1);

        $queue = new Queue($size);

        $queue->enqueue($element);

        self::assertFalse($queue->isEmpty());
    }

    public function testDequeueThrowsBadMethodCallExceptionIfQueueIsEmpty(): void
    {
        $size = $this->faker()->numberBetween(1);

        $queue = new Queue($size);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot dequeue element from empty queue.');

        $queue->dequeue();
    }

    public function testDequeueRemovesFirstElementFromFromQueueAndReturnsIt(): void
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $size = $this->faker()->numberBetween(1);

        $queue = new Queue($size);

        $queue->enqueue($elementOne);
        $queue->enqueue($elementTwo);

        self::assertSame($elementOne, $queue->dequeue());
        self::assertSame($elementTwo, $queue->dequeue());
        self::assertTrue($queue->isEmpty());
    }
}
