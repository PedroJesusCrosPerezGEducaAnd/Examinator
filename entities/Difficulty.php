<?php

class Difficulty 
{
    // Properties
    private $id;
    private $level;

    // Constructor
    public function __construct($id, $level) 
    {
        $this->setId($id);
        $this->setLevel($level);
    }

    // Getters and Setters
    public function getId() 
    {
        return $this->id;
    }
    
    private function setId($id) 
    {
        $this->id = $id;
    }
    
    public function getLevel() 
    {
        return $this->level;
    }
    
    private function setLevel($level) 
    {
        $this->level = $level;
    }
}


?>