<?php

class User implements JsonSerializable
{
    // Properties
    private $id;
    private $name;
    private $password;
    private $role;


    // Constructor
    function __construct($id = null, $name, $password, $role = null) 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPassword($password);
        $this->setRole($role);
    }


    // Getters and Setters
    function getId() 
        { return $this->id = ($this->id !== null) ? $this->id : "null"; }
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
        { return $this->role = ($this->role != "") ? $this->role : "null"; }
    private function setRole($role) 
        { $this->role = $role; }
    
    
    // Methods
    public function __toString()
    {
        return self::class . ": " . $this->getName() . " | Current role: " . $this->getRole();
    }

    function method() 
    {
        
    }

/*     function toJSON() 
    {
        return json_encode(get_object_vars($this));
    } */

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>