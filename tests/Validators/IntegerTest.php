<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 14.09.15
 * Time: 18:29
 */

namespace Validators;

use RValidate\Validators as V;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $validator = new V\Integer();

        $result = $validator->validate(11);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateException
     */
    public static function testValidate_exception()
    {
        $validator = new V\Integer();

        $validator->validate('string');
    }
}
