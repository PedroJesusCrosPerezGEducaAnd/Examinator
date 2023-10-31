<?php

    function startSession() {
        session_start();
    }

    function endSession() {
        session_destroy();
    }

    function readSession($clave) {
        return $_SESSION[$clave];
    }

    function saveSession($clave, $valor) {
        $_SESSION[$clave] = $valor;
    }

    function deleteSession($clave) {
        // hay que hacer un unset
    }
    
    function existSession($clave) {
        return isset($_SESSION[$clave]);
    }

?>