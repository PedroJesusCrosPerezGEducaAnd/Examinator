<?php

/**
 * Clase User representa un usuario con propiedades básicas.
 *
 * @package MyApp
 */
class User implements JsonSerializable
{
    /**
     * @var int|string|null Identificador único del usuario.
     */
    private $id;

    /**
     * @var string Nombre del usuario.
     */
    private $name;

    /**
     * @var string Contraseña del usuario.
     */
    private $password;

    /**
     * @var string|null Rol del usuario.
     */
    private $role;

    /**
     * Constructor de la clase User.
     *
     * @param int|string|null $id Identificador único del usuario.
     * @param string $name Nombre del usuario.
     * @param string $password Contraseña del usuario.
     * @param string|null $role Rol del usuario.
     */
    public function __construct($id = null, $name, $password, $role = null) 
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPassword($password);
        $this->setRole($role);
    }

    /**
     * Obtiene el identificador del usuario.
     *
     * @return int|string|null
     */
    public function getId() 
    {
        return $this->id = ($this->id !== null) ? $this->id : "null";
    }

    /**
     * Establece el identificador del usuario.
     *
     * @param int|string|null $id Identificador único del usuario.
     * @return void
     */
    private function setId($id) 
    {
        $this->id = $id;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string
     */
    public function getName() 
    {
        return $this->name;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $name Nombre del usuario.
     * @return void
     */
    private function setName($name) 
    {
        $this->name = $name;
    }

    /**
     * Obtiene la contraseña del usuario.
     *
     * @return string
     */
    public function getPassword() 
    {
        return $this->password;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $password Contraseña del usuario.
     * @return void
     */
    private function setPassword($password) 
    {
        $this->password = $password;
    }

    /**
     * Obtiene el rol del usuario.
     *
     * @return string|null
     */
    public function getRole() 
    {
        return $this->role = ($this->role != "") ? $this->role : "null";
    }

    /**
     * Establece el rol del usuario.
     *
     * @param string|null $role Rol del usuario.
     * @return void
     */
    private function setRole($role) 
    {
        $this->role = $role;
    }

    /**
     * Representación de cadena de la clase User.
     *
     * @return string
     */
    public function __toString()
    {
        return self::class . ": " . $this->getName() . " | Current role: " . $this->getRole();
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

?>