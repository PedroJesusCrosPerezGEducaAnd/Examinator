<?php

/**
 * Class Question
 *
 * Esta clase representa una pregunta en un examen.
 */
class Question implements JsonSerializable
{
    // Propiedades
    private $id;                // INT
    private $statement;         // STRING
    private $question=array();  // ARRAY : STRING (JSON)
    private $option;            // INT
    private $source;            // {TYPE:"", SOURCE:""} : JSON
    private $exam_id;           // INT
    private $difficulty_id;     // INT
    private $category_id;       // INT

    /**
     * Constructor de la clase Question
     *
     * @param int|null $id El ID de la pregunta.
     * @param string $statement El enunciado de la pregunta.
     * @param array|string $question La pregunta en sí.
     * @param int $option La opción seleccionada para la pregunta.
     * @param string|null $source La fuente de la pregunta.
     * @param int|null $exam_id El ID del examen al que pertenece la pregunta.
     * @param int $difficulty_id El ID de la dificultad de la pregunta.
     * @param int $category_id El ID de la categoría de la pregunta.
     */
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

    // Getters y Setters

    /**
     * Obtiene el ID de la pregunta.
     *
     * @return int El ID de la pregunta.
     */
    public function get_id() 
    {
        return $this->id;
    }

    /**
     * Establece el ID de la pregunta.
     *
     * @param int $id El ID de la pregunta.
     */
    private function set_id($id) 
    {
        $this->id = $id;
    }

    /**
     * Obtiene el enunciado de la pregunta.
     *
     * @return string El enunciado de la pregunta.
     */
    public function getStatement() 
    {
        return $this->statement;
    }

    /**
     * Establece el enunciado de la pregunta.
     *
     * @param string $statement El enunciado de la pregunta.
     */
    private function setStatement($statement) 
    {
        $this->statement = $statement;
    }

    /**
     * Obtiene la pregunta.
     *
     * @return array|string La pregunta.
     */
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

    /**
     * Obtiene la pregunta en formato JSON.
     *
     * @return string La pregunta en formato JSON.
     */
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

    /**
     * Establece la pregunta.
     *
     * @param array|string $question La pregunta.
     */
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

    /**
     * Obtiene la opción seleccionada para la pregunta.
     *
     * @return int La opción seleccionada para la pregunta.
     */
    public function getOption() 
    {
        return $this->option;
    }

    /**
     * Establece la opción seleccionada para la pregunta.
     *
     * @param int $option La opción seleccionada para la pregunta.
     */
    private function setOption($option) 
    {
        $this->option = $option;
    }

    /**
     * Obtiene la fuente de la pregunta.
     *
     * @return string La fuente de la pregunta.
     */
    public function getSource() 
    {
        return $this->source;
    }

    /**
     * Obtiene la fuente de la pregunta en formato JSON.
     *
     * @return string La fuente de la pregunta en formato JSON.
     */
    public function getSourceJSON() 
    {
        return json_decode($this->source);
    }

    /**
     * Establece la fuente de la pregunta.
     *
     * @param string $source La fuente de la pregunta.
     */
    private function setSource($source) 
    {
        $this->source = $source;
    }

    /**
     * Obtiene el ID del examen al que pertenece la pregunta.
     *
     * @return int El ID del examen al que pertenece la pregunta.
     */
    public function getExam_id() 
    {
        return $this->exam_id;
    }

    /**
     * Establece el ID del examen al que pertenece la pregunta.
     *
     * @param int $exam_id El ID del examen al que pertenece la pregunta.
     */
    private function setExam_id($exam_id) 
    {
        $this->exam_id = $exam_id;
    }

    /**
     * Obtiene el ID de la dificultad de la pregunta.
     *
     * @return int El ID de la dificultad de la pregunta.
     */
    public function getDifficulty_id() 
    {
        return $this->difficulty_id;
    }

    /**
     * Establece el ID de la dificultad de la pregunta.
     *
     * @param int $difficulty_id El ID de la dificultad de la pregunta.
     */
    private function setDifficulty_id($difficulty_id) 
    {
        $this->difficulty_id = $difficulty_id;
    }

    /**
     * Obtiene el ID de la categoría de la pregunta.
     *
     * @return int El ID de la categoría de la pregunta.
     */
    public function getCategory_id() 
    {
        return $this->category_id;
    }

    /**
     * Establece el ID de la categoría de la pregunta.
     *
     * @param int $category_id El ID de la categoría de la pregunta.
     */
    private function setCategory_id($category_id) 
    {
        $this->category_id = $category_id;
    }

    /**
     * Representación de cadena de la clase Question.
     *
     * @return string
     */
    public function __toString()
    {
        return self::class . ": " . $this->getStatement();
    }

    /**
     * Implementación de la interfaz JsonSerializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
