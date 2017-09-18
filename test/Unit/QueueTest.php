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

use Localheinz\DataStructure\Queue;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class QueueTest extends Framework\TestCase
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

        new Queue($size);
    }

    public function testDefaults()
    {
        $queue = new Queue();

        $this->assertTrue($queue->isEmpty());
        $this->assertFalse($queue->isFull());
    }

    public function testQueueThrowsBadMethodCallExceptionIfQueueIsFull()
    {
        $element = 'foo';

        $queue = new Queue(0);

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot queue element into full queue.');

        $queue->enqueue($element);
    }

    public function testQueueAddsElementToQueue()
    {
        $element = 'foo';

        $queue = new Queue();

        $queue->enqueue($element);

        $this->assertFalse($queue->isEmpty());
    }

    public function testDequeueThrowsBadMethodCallExceptionIfQueueIsEmpty()
    {
        $queue = new Queue();

        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Cannot dequeue element from empty queue.');

        $queue->dequeue();
    }

    public function testDequeueRemovesFirstElementFromFromQueueAndReturnsIt()
    {
        $elementOne = 'foo';
        $elementTwo = 'bar';

        $queue = new Queue();

        $queue->enqueue($elementOne);
        $queue->enqueue($elementTwo);

        $this->assertSame($elementOne, $queue->dequeue());
        $this->assertSame($elementTwo, $queue->dequeue());
        $this->assertTrue($queue->isEmpty());
    }
}
