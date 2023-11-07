<?php

class Session
{

    static function start() {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
    }

    static function end() {
        if (session_status() == PHP_SESSION_NONE) 
        {
            session_start();
        }
        session_destroy();
    }

    static function read($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            return $_SESSION[$clave];
        }
    }

    static function save($clave, $valor) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            $_SESSION[$clave] = $valor;
        }
    }

    static function delete($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            unset($_SESSION[$clave]);
        }
    }
    
    static function exist($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            return isset($_SESSION[$clave]);
        }
    }

}

?>