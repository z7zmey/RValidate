<?php

namespace Filters\Key;

use RValidate\Filters\Key\Regex;

class RegexTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new Regex('/foo_\d/');

        $data = [
            'foo_1' => 'bar',
            'foo_a' => 'baz'
        ];

        $result = $filter->filter($data);

        static::assertEquals(['foo_1' => 'bar'], $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new Regex('/foo_\d/');

        $data = '';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
