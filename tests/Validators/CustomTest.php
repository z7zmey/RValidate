<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 14.09.15
 * Time: 18:39
 */

namespace Validators;

use RValidate\Validators as V;

class CustomTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new V\Custom(function($data) {
            return true;
        });

        $result = $validator->validate('success');

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new V\Custom(function($data) {
            return false;
        });

        $result = $validator->validate('wrong');

        static::assertTrue($result);
    }
}
