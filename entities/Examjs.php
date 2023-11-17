<?php

Class Examjs implements JsonSerializable
{
    // Properties
    private $id;            // INT
    private $questionjs;    // OBJ Questionjs

    
    // Constructor
    public function __construct(
        $id=null, 
        $questionjs
    ) 
    {
        $this->setId($id);
        $this->setQuestionjs($questionjs);
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

    public function getQuestionjs() 
    {
        return $this->questionjs;
    }
    private function setQuestionjs($questionjs) 
    {
        $this->questionjs = $questionjs;
    }


    // Methods
    public function __toString()
    {
        return "Questionjs [ID: " . $this->id . ", Questionjs: " . $this->getQuestionjs() . "]";
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>