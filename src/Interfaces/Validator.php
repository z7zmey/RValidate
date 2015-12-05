<?php

namespace RValidate\Interfaces;

interface Validator
{
    /**
     * @param mixed $data
     * @return boolean
     * @thrown RValidate\Exceptions\ValidateException
     */
    public function validate($data) : \bool;
}