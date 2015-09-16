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

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Graph();

        $validator->validate("wrong string\n");
    }
}
