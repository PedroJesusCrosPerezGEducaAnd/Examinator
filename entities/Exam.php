<?php

class Exam 
{
    // Properties
    private $date;
    private $user_id;


    // Constructor
    public function __construct($date, $user_id) 
    {
        $this->setDate($date);
        $this->setUser_id($user_id);
    }


    // Getters and Setters
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
}

?>