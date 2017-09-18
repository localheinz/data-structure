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

namespace Localheinz\DataStructure;

final class Queue
{
    private const SIZE_MIN = 0;

    /**
     * @var int
     */
    private $maxSize;

    /**
     * @var int
     */
    private $size = 0;

    /**
     * @var array
     */
    private $elements = [];

    /**
     * Constructs an empty queue.
     *
     *
     * @param int $maxSize
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(int $maxSize = PHP_INT_MAX)
    {
        if (self::SIZE_MIN > $maxSize) {
            throw new \InvalidArgumentException(\sprintf(
                'Size needs to be equal to or greater than %d, but %d is not.',
                self::SIZE_MIN,
                $maxSize
            ));
        }

        $this->maxSize = $maxSize;
    }

    /**
     * Adds an element to the end of the queue.
     *
     * @param mixed $element
     *
     * @throws \BadMethodCallException
     */
    public function enqueue($element): void
    {
        if ($this->isFull()) {
            throw new \BadMethodCallException('Cannot queue element into full queue.');
        }

        ++$this->size;

        $this->elements[] = $element;
    }

    /**
     * Removes an element from the front of the queue.
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function dequeue()
    {
        if (true === $this->isEmpty()) {
            throw new \BadMethodCallException('Cannot dequeue element from empty queue.');
        }

        --$this->size;

        return \array_shift($this->elements);
    }

    /**
     * Returns true if queue is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->size;
    }

    /**
     * Returns true if queue is full.
     *
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->maxSize === $this->size;
    }
}
