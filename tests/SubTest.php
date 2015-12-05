<?php

use RValidate\Sub;
use RValidate\Validators\IsInteger;


class SubTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \RValidate\Exceptions\Exception
     */
    public function test_wrongFilter_exception()
    {
        new Sub((object)'param_1', new IsInteger());
    }
}
