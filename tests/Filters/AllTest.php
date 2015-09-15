<?php

namespace Filters;

use RValidate\Filters\All;

class AllTest extends \PHPUnit_Framework_TestCase
{
    public function testFilter_rightData()
    {
        $filter = new All();
        
        $data = ['key' => 'val'];
        
        $result = $filter->filter($data);
        
        static::assertEquals($data, $result);
    }

    public function testFilter_wrongData()
    {
        $filter = new All();

        $data = 'some string';

        $result = $filter->filter($data);

        static::assertEquals([], $result);
    }
}
