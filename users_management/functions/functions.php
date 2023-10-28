<?php


    function validateRequest()
    {
        $condition = false;

        if ($_SERVER["REQUEST_METHOD"] === "POST")
        { $condition = true; }

        return $condition;
    }

    function printError($error)
    {
        echo '<br> <label id="error">'.$error.'</label>';
        echo '<style>#error {color:red;}</style>';
    }


    function crearFormulario($msg="", $id="", $nombre="")
    {
        echo '
            <form action="controlador.php" method="post" name="formulario Pedro">

            <label for="id">Id: </label>
        ';
        creaInput("id",$id);
        echo '
            <br>
            <label for="nombre">Nombre: </label>
        ';
        creaInput("nombre",$nombre);
        echo'
            <br><br>
            <input type="submit" value="New" name="new">
            <input type="submit" value="Edit" name="edit">
            <input type="submit" value="Delete" name="delete">
            <input type="submit" value="Listados" name="listados">

            <br><br>
        ';
        echo $msg;
        echo '
            </form>
        ';
    }

    function crearLoginForm($error="",$campo="",$user="",$password="")
    {
    echo '
        <form action="functions/controlador.php" method="post" name="loginForm">

        <label for="user">User: </label>
    ';
    echo creaInput("user",$user);
    if ( $campo == "user" )
    { creaErrorMsg($error); }
    echo '
        <br>
        <label for="password">Password: </label>
    ';
    echo creaInput("password",$password);
    if ( $campo == "password" )
    { creaErrorMsg($error); }
    echo '
        <br><br>
        <input type="submit" value="Login" name="login">

        </form>
    ';
    }


    function validarInputs($input1, $input2)
    {
        $array[] = "";

        if ( !empty($input1) && !empty($input2) ) 
        { $array[0] = "error"; }
        elseif ( !empty($input1) ) 
        { $array[1] = "error"; }
        elseif ( !empty($input2) )
        { $array[2] = "error"; }

        return $array;
    }

    function validar()
    {
        $condition = false;

        if ( !empty($_POST["id"]) && !empty($_POST["nombre"]) ) 
        { $condition = true; }

        return $condition;
    }




    function editArray($array, $id, $newNombre)
    {
        // TODO depurar
        /*echo "Has entrado en edit";echo "<br><br>";
        echo "Tienes el siguiente array: <br>"; var_dump($array);
        echo "<br><br>";
        echo "Quieres introducir al id:$id el nombre:$newNombre";*/

        foreach ($array as $fila)
        {
            //$currentId = $fila[0];
            //$currentNombre = $fila[1];
            //echo "$fila[0] -- $fila[1] <br>";

            if (strval($fila[1]) == strval($id))
            { $fila[0] = $newNombre; echo"<br>Te encontré <br>";} // TODO depurar
        
        }
        realsaveCsv("fichero.php",$array);
        //return $array;
    }

    function editCsv2($array, $id, $nuevoNombre)
    {
        
        foreach ($array as &$item) {
            if ($item[1] == $id) {
                $item[0] = $nuevoNombre;
            }
        }

        /* COMENTARIOS PARA ENTENDER LA FUNCIÓN
        https://es.stackoverflow.com/questions/224057/qué-significa-antes-de-una-variable 
        De la documentación en http://php.net/manual/es/control-structures.foreach.php
        Para poder modificar directamente los elementos del array dentro de bucle, se ha de anteponer & a $valor. En este caso el valor será asignado por referencia.
        Para responder a tu comentario. & indica un valor por referencia (algo similar a un puntero en otros lenguajes.
        */

        return $array;
    }

    function editAndSaveCsv($rutaArchivo, $array, $id, $nuevoNombre)
    {
        
        foreach ($array as &$item) {
            if ($item[1] == $id) {
                $item[0] = $nuevoNombre;
            }
        }

        /* COMENTARIOS PARA ENTENDER LA FUNCIÓN
        https://es.stackoverflow.com/questions/224057/qué-significa-antes-de-una-variable 
        De la documentación en http://php.net/manual/es/control-structures.foreach.php
        Para poder modificar directamente los elementos del array dentro de bucle, se ha de anteponer & a $valor. En este caso el valor será asignado por referencia.
        Para responder a tu comentario. & indica un valor por referencia (algo similar a un puntero en otros lenguajes.
        */

        realsaveCsv($rutaArchivo, $array);
    }


?>