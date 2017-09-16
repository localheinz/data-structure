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

interface SinglyLinkedListNodeInterface
{
    /**
     * @throws \BadMethodCallException
     *
     * @return SinglyLinkedListNodeInterface
     */
    public function next(): SinglyLinkedListNodeInterface;

    public function hasNext(): bool;

    public function key(): string;

    /**
     * @return mixed
     */
    public function data();
}
