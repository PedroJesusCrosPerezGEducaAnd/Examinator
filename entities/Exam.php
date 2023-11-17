<?php

class Exam 
{
    // Properties
    private $id;
    private $date;
    private $user_id;


    // Constructor
    public function __construct($id=null,$date=null, $user_id) 
    {
        $this->setId($id);
        $this->setDate($date);
        $this->setUser_id($user_id);
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

    public function getDate() 
    {
        return $this->date;
    }
    private function setDate($date) 
    {
        $this->date = $date;
    }
    
    public function getUser_id() 
    {
        return $this->user_id;
    }
    private function setUser_id($user_id) 
    {
        $this->user_id = $user_id;
    }


    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>