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

use Localheinz\DataStructure\SinglyLinkedList;
use Localheinz\DataStructure\SinglyLinkedListInterface;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class SinglyLinkedListTest extends Framework\TestCase
{
    use Helper;

    public function testImplementsLinkedListInterface()
    {
        $this->assertClassImplementsInterface(
            SinglyLinkedListInterface::class,
            SinglyLinkedList::class
        );
    }
}
