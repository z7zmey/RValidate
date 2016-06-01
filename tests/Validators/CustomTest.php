<?php

namespace Validators;

use RValidate\Validators\Custom;

class CustomTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new Custom(function() {
            return true;
        });

        $result = $validator->validate('success');

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new Custom(function() {
            return false;
        });

        $result = $validator->validate('wrong');

        static::assertFalse($result);
    }
}
