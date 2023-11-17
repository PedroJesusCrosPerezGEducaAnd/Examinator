<?php

class Exam_has_question implements JsonSerializable
{
    // Properties
    private $exam_id;
    private $arrayQuestion;


    // Constructor
    function __construct($exam_id = null, $arrayQuestion) 
    {
        $this->setExam_id($exam_id);
        $this->setArrayQuestion_id($arrayQuestion);
    }


    // Getters and Setters
    public function getExam_id() 
        { return $this->exam_id = ($this->exam_id !== null) ? $this->exam_id : "null"; }
    private function setExam_id($exam_id) 
        { $this->exam_id = $exam_id; }

    public function getArrayQuestion_id() 
        { return $this->arrayQuestion; }
    private function setArrayQuestion_id($arrayQuestion) 
        { $this->arrayQuestion = $arrayQuestion; }

    
    // Methods
    public function __toString()
    {
        return self::class . ": " . $this->getExam_id() . " | Questions id: " . var_dump($this->getArrayQuestion_id());
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>