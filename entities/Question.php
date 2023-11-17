<?php

Class Question implements JsonSerializable
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
        $source=null, 
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
        if (is_array($this->question)) {
            // Si es un array, devuelvo el array tal cual
            return $this->question;
        } elseif ($this->question !== null || json_last_error() === JSON_ERROR_NONE) {
            // Si ha sido codificado en json (json_decode()), lo decodifico y lo devuelvo
            return json_decode($this->question);
        } else {
            // Y sino, lo devuelvo tal cuál está
            return $this->question;
        }
    }
    public function getQuestionJSON() 
    {
        if (is_array($this->question)) {
            return json_encode($this->question);
        } elseif ($this->question !== null || json_last_error() === JSON_ERROR_NONE) {
            return $this->question;
        } else {
            // Si no es un json, lo transformo a JSON
            return json_encode($this->question);
        }
    }
    private function setQuestion($question) 
    {
        // Si es un array, lo asigno tal cual está
        if (is_array($question)) {
            $this->question = $question;
        } else {
            // Si es una cadena, lo decodifico y lo asigno
            $this->question = json_decode($question);
            // Verifica si hubo algún error en la decodificación
            if (json_last_error() !== JSON_ERROR_NONE) {
                // Maneja el error como desees, por ejemplo, lanzando una excepción
                throw new \Exception('Error al decodificar JSON: ' . json_last_error_msg());
            }
        }
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
    public function __toString()
    {
        return "Question [ID: " . $this->id . ", Statement: " . $this->statement . "]";
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>