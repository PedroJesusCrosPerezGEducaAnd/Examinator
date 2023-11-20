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
        Session::start();
        session_destroy();
    }

    static function read($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            Session::start();
        }
        return $_SESSION[$clave] ?? null;
    }

    static function save($clave, $valor) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            Session::start();
        }
        $_SESSION[$clave] = $valor;
    }

    static function delete($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            Session::start();
        }
        unset($_SESSION[$clave]);
    }
    
    static function exist($clave) {
        if (session_status() == PHP_SESSION_NONE) 
        {
            Session::start();
        }
        return $_SESSION[$clave] ?? null;
    }

}

?>