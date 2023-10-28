<?php
    /**
     * Libraries
     */
    require_once '../configFile.php';
?>

<?php

    function isEmptyId()
    {
        $condition = false;

        if ( empty($_POST["id"]) )
        { $condition = true; }

        return $condition;
    }

    function isEmptyNombre()
    {
        $condition = false;

        if ( empty($_POST["nombre"]) )
        { $condition = true; }

        return $condition;
    }

    function isValidId()
    {
        $condition = false;

        if ( is_numeric($_POST["id"]) )
        { $condition = true; }

        return $condition;
    }

    function isValidNombre()
    {
        $condition = false;

        if ( !is_numeric($_POST["nombre"]) )
        { $condition = true; }

        return $condition;
    }

    function isValidInput($campo)
    {
        global $errorNew, $errorEdit;
        $result = false;

        switch ($campo)
        {
            case 'new':
                if ( !isEmptyId() && !isEmptyNombre() && isValidId() && isValidNombre() )
                    { $result = true; }
                    else
                    { $result = $errorNew; }
                break;
                
            case 'edit':
                if ( !isEmptyId() && !isEmptyNombre() && isValidId() && isValidNombre() )
                    { $result = true; }
                    else
                    { $result = $errorEdit; }
                break;
                
            case 'delete':
                if ( !isEmptyId() && isValidId() )
                    { $result = true; }
                    else
                    { $result = 'Error en la acción delete'; }
                break;
                
            case 'etc':
                # code...
                break;
        }

        return $result;
    }

?>