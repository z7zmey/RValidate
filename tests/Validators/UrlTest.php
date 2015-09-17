<?php

namespace Validators;

use RValidate\Validators\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Url();

        $result = $validator->validate('http://www.example.com/example?example=1#example');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Url();

        $validator->validate('example.com');
    }
}
