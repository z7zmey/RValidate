<?php

namespace RValidate\Interfaces;


interface Validator
{
    /**
     * @param mixed $data
     * @return bool
     * @thrown RValidate\Exceptions\ValidateException
     */
    public function validate($data);
}