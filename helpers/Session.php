<?php

class Session
{

    static function start() {
        session_start();
    }

    static function end() {
        session_destroy();
    }

    static function read($clave) {
        return $_SESSION[$clave];
    }

    static function save($clave, $valor) {
        $_SESSION[$clave] = $valor;
    }

    static function delete($clave) {
        unset($_SESSION[$clave]);
    }
    
    static function exist($clave) {
        return isset($_SESSION[$clave]);
    }

}

?>