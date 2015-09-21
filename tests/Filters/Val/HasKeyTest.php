<?php

namespace Filters\Val;

use RValidate\Filters\Val\HasKey;

class HasKeyTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new HasKey('foo', 'bar');

        $data = [
            ['foo' => 'bar'],
            ['bar' => 'baz']
        ];

        $result = $filter->filter($data);

        static::assertEquals([['foo' => 'bar']], $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new HasKey('foo', 'bar');

        $data = [
            'foo' => 'bar',
            ['bar' => 'baz']
        ];

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }

    public function testFilter_wrongArray()
    {
        $filter = new HasKey('foo', 'bar');

        $data = '';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
