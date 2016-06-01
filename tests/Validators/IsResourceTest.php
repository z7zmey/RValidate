<?php

namespace Validators;

use RValidate\Validators\IsResource;

class IsResourceTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new IsResource();

        $result = $validator->validate(fopen(__DIR__ . DIRECTORY_SEPARATOR . 'IsResourceTest.php', 'r'));

        static::assertTrue($result);
    }
    
    public static function testValidate_exception()
    {
        $validator = new IsResource();

        $result = $validator->validate('string');

        static::assertFalse($result);
    }
}
