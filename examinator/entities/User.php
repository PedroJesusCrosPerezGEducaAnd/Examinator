<?php

class User 
{
    // Properties
    private $id;
    private $name;
    private $password;
    private $role;


    // Constructor
    function __construct($id, $name, $password, $role = null) 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPassword($password);
        $this->setRole($role);
    }


    // Getters and Setters
    function getId() 
        { return $this->id; }
    
    private function setId($id) 
        { $this->id = $id; }

    function getName() 
        { return $this->name; }
    
    private function setName($name) 
        { $this->name = $name; }

    function getPassword() 
    { return $this->password; }
    
    private function setPassword($password) 
        { $this->password = $password; }


    function getRole() 
    { return $this->role; }
    
    private function setRole($role) 
        { $this->role = $role; }
    
    
    // Methods
    function method() 
    {
        
    }
}

?>