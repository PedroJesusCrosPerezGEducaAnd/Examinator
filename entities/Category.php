<?php

class Category 
{
    // Properties
    private $id;
    private $name;

    // Constructor
    public function __construct($id, $name) {
        $this->setId($id);
        $this->setName($name);
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    
    private function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    private function setName($name) {
        $this->name = $name;
    }
}


?>