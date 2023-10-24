<?php

class Example 
{
    // Properties
    private $id;
    private $name;


    // Constructor
    function __construct($id) 
    {
        $this->setId($id);
    }


    // Getters and Setters
    function getId() 
        { return $this->id; }
    
    private function setId($id) 
        { $this->id = $id; }

    
    // Methods
    function method() 
    {
        
    }
}

?>