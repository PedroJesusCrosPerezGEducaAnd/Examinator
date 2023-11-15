<?php

class Response implements JsonSerializable
{
    // Properties
    private $response;
    //private $error;


    // Constructor
    function __construct($response) 
    {
        $this->setResponse($response);
    }


    // Getters and Setters
    function getResponse() 
        { return $this->response = ($this->response !== null) ? $this->response : "null"; }
    private function setResponse($response) 
        { $this->response = $response; }

    /*function getError() 
        { return $this->error = ($this->error !== null) ? $this->error : "null"; }
    private function setError($error) 
        { $this->error = $error; }
    
    
    // Methods
    public function __toString()
    {
        return (self::isError() !== null) ? self::class . ": " . $this->getError() : self::class . ": " . $this->getResponse();
    }

    public function isError() 
    {
        return isset($this->error) ? true : false;
    }

*//*     function toJSON() 
    {
        return json_encode(get_object_vars($this));
    } */

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>