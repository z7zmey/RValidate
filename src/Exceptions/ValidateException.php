<?php
namespace RValidate\Exceptions;

use \RValidate\Iterators\Errors;
use \RValidate\Iterators\ErrorsIterator;

class ValidateException extends Exception
{
    private $errors;

    /**
     * @return Errors
     */
    public function getErrors() : Errors
    {
        return $this->errors;
    }

    /**
     * @return ErrorsIterator
     */
    public function getErrorsIterator() : ErrorsIterator
    {
        return new ErrorsIterator($this->errors);
    }

    /**
     * @param \RValidate\Iterators\Errors $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }
}