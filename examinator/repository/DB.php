<?php

class DB
{
    // Properties
    private $cn;


    // Constructor
    function __construct()
    {
        
    }


    // Getters and Setters
    function getConection() 
    {
        return $this->cn;
    }

    function setConection($cn) 
    {
        return $this->cn = $cn;
    }


    // Methods
    

}

?>