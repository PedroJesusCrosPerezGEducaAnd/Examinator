<?php

/**
 * Clase Examjs representa un examen en JavaScript.
 */
class Examjs implements JsonSerializable
{
    /**
     * @var int|null Id del examen.
     */
    private $id;

    /**
     * @var array|null Array de objetos Questionjs.
     */
    private $questionjs;

    /**
     * Constructor de la clase Examjs.
     *
     * @param int|null $id Id del examen.
     * @param array $questionjs Array de objetos Questionjs.
     */
    public function __construct($id = null, $questionjs)
    {
        $this->setId($id);
        $this->setQuestionjs($questionjs);
    }

    /**
     * Obtiene el id del examen.
     *
     * @return int|null Id del examen.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Establece el id del examen.
     *
     * @param int|null $id Id del examen.
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Obtiene el array de objetos Questionjs.
     *
     * @return array|null Array de objetos Questionjs.
     */
    public function getQuestionjs()
    {
        return $this->questionjs;
    }

    /**
     * Establece el array de objetos Questionjs.
     *
     * @param array $questionjs Array de objetos Questionjs.
     */
    private function setQuestionjs($questionjs)
    {
        $this->questionjs = $questionjs;
    }

    /**
     * Implementación de la interfaz JsonSerializable.
     * Convierte el objeto a un array asociativo para su serialización JSON.
     *
     * @return array Array asociativo con las propiedades del objeto.
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
