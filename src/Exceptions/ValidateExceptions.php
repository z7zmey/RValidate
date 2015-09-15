<?php
namespace RValidate\Exceptions;

class ValidateExceptions extends Exception
{
    private $exceptions = [];
    
    public function count()
    {
        return count($this->exceptions);
    }

    /**
     * @return array
     */
    public function getExceptions()
    {
        return $this->exceptions;
    }
    
    public function add(ValidateException $e)
    {
        $this->exceptions[] = $e;
    }
    
    public function getMessages()
    {
        $response = [];
        /* @var ValidateException $e */
        foreach ($this->exceptions as $e) {
            $response[] = [
                'path' => '[' . implode('][', $e->getPath()) . ']',
                'message' => $e->getMessage()
            ];
        }
        
        return $response;
    }
}