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
        Session::start();
        return $_SESSION[$clave] ?? null;
    }

    static function save($clave, $valor) {
        Session::start();
        $_SESSION[$clave] = $valor;
    }

    static function delete($clave) {
        Session::start();
        unset($_SESSION[$clave]);
    }
    
    static function exist($clave) {
        Session::start();
        return $_SESSION[$clave] ?? null;
    }

}

?>