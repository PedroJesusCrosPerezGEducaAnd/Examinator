<?php

    function startSession() {
        session_start();
    }

    function endSession() {
        session_destroy();
    }

    function saveSession($clave, $valor) {
        $_SESSION[$clave] = $valor;
    }

    function readSession($clave) {
        return $_SESSION[$clave];
    }
    
    function existSession($clave) {
        return isset($_SESSION[$clave]);
    }

?>