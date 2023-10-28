<?php
    /**
     * ######################################################
     * ################# Configuration file #################
     * ######################################################
     */

    /**
     * Core files path
     */
    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    // PHP
        // Data base
        $cfDb_php = $docRoot.'db/dataBase.php';
        // Entities
        $cfUser_php = $docRoot.'entities/user.php';
        // forms
        $cfCommonFunctions_php = $docRoot.'forms/formsFunctions/commonFunctions.php';
        $cfLoginForm = $docRoot."forms/printForm/classForm/createLoginForm.php";
        $cfMainForm = $docRoot."forms/printForm/classForm/createMainForm.php";
    // CSV
    $cfUsers_csv = $docRoot."sources/db/users.csv";
    $sourceDbCredencials = $docRoot."sources/db/credentials.csv";
    $currentUserFile = $docRoot."sources/db/currentUser.csv";


    $msgFile = "msg.txt";
    $errorsFile = $docRoot."forms/mainForm/errors/";
    // Forms
    $errorLoginFile = $docRoot."sources/errors/errorLogin.txt";

    /**
     * Files path
     */


    /**
     * Feedback - Mensajes a mostrar cuando se realizada una acción correctamente
     */
    $msgGoodNew = "¡Los datos se han guardado correctamente!";
    $msgGoodEdit = "¡Se ha editado el nombre correctamente!";
    $msgGoodDelete = "¡Se ha borrado correctamente!";
    $msgEmptyListados = "¡No hay ningúna persona creada en este momento!";

    /**
     * Errors
     */
    $errorUsersFileNotFound = "Error - No se ha podido encontrado el fichero users.csv.";
    $errorId = "No has introducido id.";
    $errorNombre = "No has introducido nombre.";
    $errorNew = "Error. No has introducido id o nombre.";
    $errorEdit = "Se ha producido un error en la modificación de la persona.";
    $errorDelete = "Se ha producido un error en el borrado de la persona.";
    $errorLogin = "Las credenciales no son válidas.";


    if ( isset($_POST["id"]) ) 
    { $id = $_POST["id"]; }
    else
    { $id = ""; }
    if ( isset($_POST["nombre"]) ) 
    { $nombre = $_POST["nombre"]; }
    else
    { $nombre = ""; }
    $found = $saved = false;


    function saludar() {
        echo "Holaaa!!";
    }



    function getCommonFunctions()
    {
        $commonFunctions1=$commonFunctions2=$commonFunctions3='';
        $commonFunctions1 = "forms/formsFunctions/commonFunctions.php";
        $commonFunctions2 = "../forms/formsFunctions/commonFunctions.php";
        $commonFunctions3 = "../../forms/formsFunctions/commonFunctions.php";
        $commonFunctions4 = "../../../forms/formsFunctions/commonFunctions.php";

        if ( file_exists($commonFunctions1) ) return $commonFunctions1;
        elseif ($commonFunctions2)          return $commonFunctions2;
        elseif ($commonFunctions3)          return $commonFunctions3;
        elseif ($commonFunctions4)          return $commonFunctions4;
    }
?>