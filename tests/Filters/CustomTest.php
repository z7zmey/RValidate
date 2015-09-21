<?php

namespace Filters;

use RValidate\Filters\Custom;

class CustomTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $func = function($val, $key) {
            return $key === 'foo' && $val === 'bar';
        };
        
        $filter = new Custom($func);

        $data = [
            'foo' => 'bar',
            'bar' => 'baz'
        ];

        $result = $filter->filter($data);

        static::assertEquals(['foo' => 'bar'], $result);
    }

    public function testFilter_wrongData()
    {
        $func = function($val, $key) {
            return $val === $key;
        };
        
        $filter = new Custom($func);

        $data = [
            'foo' => 'bar',
            'bar' => 'baz'
        ];

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }

    public function testFilter_wrongArray()
    {
        $func = function($val, $key) {
            return $val === $key;
        };

        $filter = new Custom($func);

        $data = '';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
