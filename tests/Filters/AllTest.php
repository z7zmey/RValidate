<?php

namespace Filters;


class AllTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new \RValidate\Filters\All();
        
        $data = ['key' => 'val'];
        
        $result = $filter->filter($data);
        
        static::assertEquals($data, $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new \RValidate\Filters\All();

        $data = 'some string';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
