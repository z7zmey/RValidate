<?php

namespace Validators;

use RValidate\Validators\Count;

class CountTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Count(2);

        $result = $validator->validate(['foo', 'bar']);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new Count(2);

        $validator->validate(['foo']);
    }
}
