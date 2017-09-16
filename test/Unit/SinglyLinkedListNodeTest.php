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

use Localheinz\DataStructure\SinglyLinkedListNode;
use Localheinz\DataStructure\SinglyLinkedListNodeInterface;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class SinglyLinkedListNodeTest extends Framework\TestCase
{
    use Helper;

    public function testImplementsSinglyLinkedListNodeInterface()
    {
        $this->assertClassImplementsInterface(
            SinglyLinkedListNodeInterface::class,
            SinglyLinkedListNode::class
        );
    }

    public function testConstructorSetsValues()
    {
        $key = 'foo';
        $data = 'bar';

        $node = new SinglyLinkedListNode(
            $key,
            $data
        );

        $this->assertSame($key, $node->key());
        $this->assertSame($data, $node->data());
    }

    public function testDefaults()
    {
        $node = new SinglyLinkedListNode(
            'foo',
            'bar'
        );

        $this->assertSame('foo', $node->key());
        $this->assertSame('bar', $node->data());

        $this->assertFalse($node->hasNext());
    }
}
