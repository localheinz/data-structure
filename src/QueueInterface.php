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

interface QueueInterface
{
    /**
     * @param mixed $element
     *
     * @throws \BadMethodCallException
     */
    public function enqueue($element): void;

    /**
     * @throws \BadMethodCallException
     *
     * @return mixed
     */
    public function dequeue();

    public function isEmpty(): bool;

    public function isFull(): bool;
}
