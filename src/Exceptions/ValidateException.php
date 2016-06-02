<?php
namespace RValidate\Exceptions;

class ValidateException extends Exception
{
    private $errors = [];

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @param array $error
     */
    public function addError($error)
    {
        $this->errors[] = $error;
    }
}