<?php

class Responsee implements JsonSerializable
{
    // Properties
    private $status;
    private $code;
    //private $arrayCode; // ¿mejor o suponemos que si es 200 ya tiene el OK?
    private $detail;

    // 100's : warning
    // case 100: 'Continue';
    // case 101: 'Switching Protocols';
    // 200's : true
    // case 200: 'OK';
    // case 201: 'Selected: SELECT query made';
    // case 202: 'Inserted: INSERT query made';
    // case 203: 'Updated: UPDATE query made';
    // case 204: 'Deleted: DELETE query made';
    // case 205: 'Non-Authoritative Information';
    // case 206: 'No Content';
    // case 207: 'Reset Content';
    // 400's : false
    // case 400: 'Bad Request';
    // case 401: 'Unauthorized';
    // case 402: 'Empty';
    // case 403: 'Request Time-out';
    // case 404: 'Not Found';
    // case 405: 'Not Int';
    // case 406: 'Not String';
    // case 407: 'Method Not Allowed';
    // case 408: 'Conflict';
    // case 409: 'Request-URI Too Large';
    // case 410: 'Unsupported Media Type';
    // 500's : error
    // case 500: 'Internal Server Error';
    // case 501: 'Not Implemented';
    // case 502: 'Bad Gateway';
    // case 503: 'Service Unavailable';


    // Constructor
    function __construct($status, $code, $detail) 
    {
        $this->setStatus($status);
        $this->setCode($code);
        $this->setDetail($detail);
    }


    // Getters and Setters
    function getStatus() { 
        return $this->status = ($this->status !== null) ? $this->status : "null";
    }
    private function setStatus($status) { 
        $this->status = $status; 
    }
    
    function getCode() { 
        return $this->code = ($this->code !== null) ? $this->code : "null";
    }
    private function setCode($code) { 
        $this->code = $code; 
    }
    
    function getDetail() { 
        return $this->detail = ($this->detail !== null) ? $this->detail : "null";
    }
    private function setDetail($detail) { 
        $this->detail = $detail; 
    }


    // Methods
    public function __toString()
    {
        return "[" . self::class . "=> STATUS: " . $this->getStatus() . " | CODE: " . $this->getCode() . " | DETAIL: " . $this->getDetail() . "]";
    }

    function toJSON() 
    {
        return json_encode(get_object_vars($this));
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>