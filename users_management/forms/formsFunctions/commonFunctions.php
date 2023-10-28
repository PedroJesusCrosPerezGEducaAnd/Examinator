<?php

    /*function isLoged($ubicacion)
    {
        $condition = false;

        if ( file_exists($ubicacion) )
        {
            $currentUser = file_get_contents($ubicacion);
            if ( $currentUser != ';' )
            { $condition = true; }
        }
        
        return $condition;
    }*/



    /**
     * $campo : 
     * $valor : 
     */
    function creaInput($campo, $valor)
    {
        switch ($campo) 
        {
            case 'id':
                echo '<input type="text" name="id" autofocus value='.$valor.'>';
                break;
            case 'nombre':
                echo '<input type="text" name="nombre" value='.$valor.'>';
                break;
            case 'user':
                echo '<input type="text" name="user" autofocus value='.$valor.'>';
                break;
            case 'password':
                echo '<input type="text" name="password" value='.$valor.'>';
                break;
            case 'uploadImage':
                echo '<input type="file" name="uploadImage">';
                break;
        }
    }

    /**
     * $errorMsg :
     */
    function creaErrorMsg($errorMsg="")
    {
        echo '<label for="id">'.$errorMsg.'</label>';
    }

    /**
     * $msg :
     */
    function createMsg($msg="")
    { echo '<label>'.$msg.'</label>'; }
?>