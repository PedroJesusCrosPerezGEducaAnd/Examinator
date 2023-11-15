<?php

Class Question 
{
    // Properties
    private $id;                // INT
    private $statement;         // STRING
    private $question=array();  // ARRAY : STRING (JSON)
    private $option;            // INT
    private $source;            // {TYPE:"", SOURCE:""} : JSON
    private $exam_id;           // INT
    private $difficulty_id;     // INT
    private $category_id;       // INT

    
    // Constructor
    public function __construct(
        $id=null, 
        $statement, 
        $question, 
        $option, 
        $source, 
        $exam_id=null, 
        $difficulty_id, 
        $category_id
    ) 
    {
        $this->set_id($id);
        $this->setStatement($statement);
        $this->setQuestion($question);
        $this->setOption($option);
        $this->setSource($source);
        $this->setExam_id($exam_id);
        $this->setDifficulty_id($difficulty_id);
        $this->setCategory_id($category_id);
    }


    // Getters and Setters
    public function get_id() 
    {
        return $this->id;
    }
    private function set_id($id) 
    {
        $this->id = $id;
    }

    public function getStatement() 
    {
        return $this->statement;
    }
    private function setStatement($statement) 
    {
        $this->statement = $statement;
    }

    public function getQuestion() 
    {
        return $this->question;
    }
    public function getQuestionJSON() 
    {
        return json_encode($this->question);
    }
    private function setQuestion($question) 
    {
        $this->question = $question;
    }

    public function getOption() 
    {
        return $this->option;
    }
    private function setOption($option) 
    {
        $this->option = $option;
    }

    public function getSource() 
    {
        return $this->source;
    }
    public function getSourceJSON() 
    {
        return json_decode($this->source);
    }
    private function setSource($source) 
    {
        $this->source = $source;
    }

    public function getExam_id() 
    {
        return $this->exam_id;
    }
    private function setExam_id($exam_id) 
    {
        $this->exam_id = $exam_id;
    }

    public function getDifficulty_id() 
    {
        return $this->difficulty_id;
    }
    private function setDifficulty_id($difficulty_id) 
    {
        $this->difficulty_id = $difficulty_id;
    }

    public function getCategory_id() 
    {
        return $this->category_id;
    }
    private function setCategory_id($category_id) 
    {
        $this->category_id = $category_id;
    }

    // Methods
    // TODO toString
}

?>