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

interface SinglyLinkedListInterface
{
    public function insert(string $key, SinglyLinkedListNodeInterface $node): void;

    public function delete(string $key): void;

    public function search(string $key);
}
