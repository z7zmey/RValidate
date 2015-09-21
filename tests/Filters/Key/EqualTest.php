<?php

namespace Filters\Key;

use RValidate\Filters\Key\Equal;

class EqualTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new Equal('foo');

        $data = ['foo' => 'foo', 'bar' => 'bar'];

        $result = $filter->filter($data);

        static::assertEquals(['foo' => 'foo'], $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new Equal('foo');

        $data = ['bar' => 'bar'];

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
