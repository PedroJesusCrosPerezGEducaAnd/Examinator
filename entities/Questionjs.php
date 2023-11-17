<?php

Class Questionjs implements JsonSerializable
{
    // Properties
    private $id;                // INT
    private $statement;         // STRING
    private $question=array();  // ARRAY : STRING (JSON)
    private $difficulty;     // OBJ Difficulty
    private $category;       // OBJ Category

    
    // Constructor
    public function __construct(
        $id=null, 
        $statement, 
        $question, 
        $difficulty, 
        $category
    ) 
    {
        $this->setId($id);
        $this->setStatement($statement);
        $this->setQuestion($question);
        $this->setDifficulty($difficulty);
        $this->setCategory($category);
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
    
    public function getDifficulty() 
    {
        return $this->difficulty;
    }
/*     private function setDifficulty($difficulty) 
    {
        $this->difficulty = $difficulty;
    } */
    private function setDifficulty(Difficulty $difficulty) 
    {
        $this->difficulty = $difficulty;
    }

    public function getCategory() 
    {
        return $this->category;
    }
    private function setCategory(Category $category) 
    {
        $this->category = $category;
    }

    // Methods
    public function __toString()
    {
        return "Questionjs [ID: " . $this->id . ", Statement: " . $this->statement . "]";
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>