<?php

class Session
{

    static function startSession() {
        session_start();
    }

    static function endSession() {
        session_destroy();
    }

    static function readSession($clave) {
        return $_SESSION[$clave];
    }

    static function saveSession($clave, $valor) {
        $_SESSION[$clave] = $valor;
    }

    static function deleteSession($clave) {
        unset($_SESSION[$clave]);
    }
    
    static function existSession($clave) {
        return isset($_SESSION[$clave]);
    }

}

?>