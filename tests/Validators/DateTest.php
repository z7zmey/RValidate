<?php

namespace Validators;

use RValidate\Validators\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        date_default_timezone_set('UTC');
    }
    
    public function testValidate()
    {
        $validator = new Date();

        $result = $validator->validate('2012-09-20 13:22:07');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Date();

        $validator->validate('@example.com');
    }
}
