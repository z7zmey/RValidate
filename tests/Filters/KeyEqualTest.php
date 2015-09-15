<?php

namespace Filters;


class KeyEqualTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new \RValidate\Filters\KeyEqual('foo', 'bar');

        $data = [
            ['foo' => 'bar'],
            ['bar' => 'baz']
        ];

        $result = $filter->filter($data);

        static::assertEquals([['foo' => 'bar']], $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new \RValidate\Filters\KeyEqual('foo', 'bar');

        $data = [
            'foo' => 'bar',
            ['bar' => 'baz']
        ];

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }

    public function testFilter_wrongArray()
    {
        $filter = new \RValidate\Filters\KeyEqual('foo', 'bar');

        $data = '';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
