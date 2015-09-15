<?php

use RValidate\Validator;
use RValidate\Iterators\Pattern as P;
use RValidate\Validators as V;


class ValidatorTest extends PHPUnit_Framework_TestCase
{
    public function testValidate_success()
    {
        $data = 'string value';

        $pattern = P::all()->validate(new V\String());

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function testValidate_error()
    {
        $data = null;

        $pattern = P::all()->validate(new V\Required());

        Validator::run($data, $pattern);
    }

    public function testValidate_nested_success()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = P::all()->validate(
            P::get('param_1')->validate(
                P::get('param_2')->validate(new V\String())
            )
        );

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    /**
     * @expectedException \RValidate\Exceptions\ValidateExceptions
     */
    public function testValidate_nested_error()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = P::all()->validate(
            P::get('param_1')->validate(
                P::get('param_2')->validate(new V\Integer())
            )
        );

        $result = Validator::run($data, $pattern);

        static::assertTrue($result);
    }

    public function testValidate_errorMessages()
    {
        $data = [
            'param_1' => [
                'param_2' => 'string value'
            ]
        ];

        $pattern = P::all()->validate(
            new V\KeyExist('Param_2'),
            P::get('param_1')->validate(
                P::get('param_2')->validate(new V\Integer())
            )
        );

        $expected = [
            [
                'path' => '[]',
                'message' => 'must contain key Param_2'
            ],
            [
                'path' => '[][param_1][param_2]',
                'message' => 'must be integer'
            ]
        ];

        try {
            Validator::run($data, $pattern);
        } catch (\RValidate\Exceptions\ValidateExceptions $e) {
            $messagesArray = $e->getMessages();

            static::assertEquals($expected, $messagesArray);
        }
    }
}
