<?php

namespace Validators;

use RValidate\Validators\Graph;

class GraphTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Graph();

        $result = $validator->validate('success_string');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Graph();

        $result = $validator->validate("wrong string\n");

        static::assertFalse($result);
    }
}
