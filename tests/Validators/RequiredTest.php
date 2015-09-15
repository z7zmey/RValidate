<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 14.09.15
 * Time: 18:34
 */

namespace Validators;

use RValidate\Validators as V;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new V\Required();

        $result = $validator->validate(true);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_null_exception()
    {
        $validator = new V\Required();

        $validator->validate(null);
    }
}
