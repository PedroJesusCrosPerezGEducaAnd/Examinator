<?php

/**
 * Clase Exam representa un examen.
 */
class Exam implements JsonSerializable
{
    /**
     * @var int|null Id del examen.
     */
    private $id;

    /**
     * @var string|null Fecha del examen.
     */
    private $date;

    /**
     * @var int Id del usuario asociado al examen.
     */
    private $user_id;

    /**
     * Constructor de la clase Exam.
     *
     * @param int|null $id Id del examen.
     * @param string|null $date Fecha del examen.
     * @param int $user_id Id del usuario asociado al examen.
     */
    public function __construct($id = null, $date = null, $user_id)
    {
        $this->setId($id);
        $this->setDate($date);
        $this->setUser_id($user_id);
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
     * Obtiene la fecha del examen.
     *
     * @return string|null Fecha del examen.
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Establece la fecha del examen.
     *
     * @param string|null $date Fecha del examen.
     */
    private function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Obtiene el id del usuario asociado al examen.
     *
     * @return int Id del usuario asociado al examen.
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Establece el id del usuario asociado al examen.
     *
     * @param int $user_id Id del usuario asociado al examen.
     */
    private function setUser_id($user_id)
    {
        $this->user_id = $user_id;
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
