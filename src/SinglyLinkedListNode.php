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

final class SinglyLinkedListNode implements SinglyLinkedListNodeInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $data;

    public function __construct(string $key, $data)
    {
        $this->key = $key;
        $this->data = $data;
    }

    public function next(): SinglyLinkedListNodeInterface
    {
    }

    public function hasNext(): bool
    {
        return false;
    }

    public function key(): string
    {
        return $this->key;
    }

    public function data()
    {
        return $this->data;
    }
}
