<?php

namespace Filters;


class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new \RValidate\Filters\Equal('foo');

        $data = ['foo' => 'foo', 'bar' => 'bar'];

        $result = $filter->filter($data);

        static::assertEquals(['foo' => 'foo'], $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new \RValidate\Filters\Equal('foo');

        $data = ['bar' => 'bar'];

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
