<?php

class DB extends mysqli
{
    // Properties -> host, user, password, data_base_name

    
    // Constructor
    function __construct($host, $user, $password, $data_base_name)
    {
        parent::__construct($host, $user, $password, $data_base_name);
        $this->setConection($this);
    }


    // Getters and Setters
    function getConection() 
    { return $this->cn; }

    private function setConection($cn) 
    { return $this->cn = $cn; }


    // Methods


}

?>