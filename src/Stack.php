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

final class Stack
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
     * Constructs an empty stack.
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
     * Pushes an element onto the stack.
     *
     * @param mixed $element
     *
     * @throws \BadMethodCallException
     */
    public function push($element): void
    {
        if ($this->isFull()) {
            throw new \BadMethodCallException('Cannot push element onto full stack.');
        }

        ++$this->size;

        $this->elements[] = $element;
    }

    /**
     * Pops an element from the top of the stack.
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function pop()
    {
        if (true === $this->isEmpty()) {
            throw new \BadMethodCallException('Cannot pop element from empty stack.');
        }

        --$this->size;

        return \array_pop($this->elements);
    }

    /**
     * Returns the top-most element on the stack, without removing it from the stack.
     *
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function peek()
    {
        if (true === $this->isEmpty()) {
            throw new \BadMethodCallException('Cannot peek into empty stack.');
        }

        return \end($this->elements);
    }

    /**
     * Returns true if the stack is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return 0 === $this->size;
    }

    /**
     * Returns true if the stack is full.
     *
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->maxSize === $this->size;
    }
}
