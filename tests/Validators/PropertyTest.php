<?php

namespace Validators;

use RValidate\Validators\Property;

class PropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Property('example');

        $obj = new \stdClass();
        $obj->example = 'some value';
        
        $result = $validator->validate($obj);

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Property('example');

        $result = $validator->validate(new \stdClass());

        static::assertFalse($result);
    }
}
