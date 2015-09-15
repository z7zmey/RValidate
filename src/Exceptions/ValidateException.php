<?php
namespace RValidate\Exceptions;

class ValidateException extends Exception
{
    private $path = [];

    /**
     * @return array
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param array $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    
}