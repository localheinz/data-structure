<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @link https://github.com/localheinz/data-structure
 */

namespace Localheinz\DataStructure\Test\Unit;

use Localheinz\DataStructure\Queue;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
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
        $queue = new Queue();

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

        $queue = new Queue();

        $queue->enqueue($element);

        self::assertFalse($queue->isEmpty());
    }

    public function testDequeueThrowsBadMethodCallExceptionIfQueueIsEmpty(): void
    {
        $queue = new Queue();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot dequeue element from empty queue.');

        $queue->dequeue();
    }

    public function testDequeueRemovesFirstElementFromFromQueueAndReturnsIt(): void
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $queue = new Queue();

        $queue->enqueue($elementOne);
        $queue->enqueue($elementTwo);

        self::assertSame($elementOne, $queue->dequeue());
        self::assertSame($elementTwo, $queue->dequeue());
        self::assertTrue($queue->isEmpty());
    }
}
