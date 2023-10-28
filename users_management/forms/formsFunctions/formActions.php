<?php
    /**
     * Libraries
     */
    $configFile1='configFile.php'; $configFile2='../configFile.php'; $configFile3='../../configFile.php';
    if ( file_exists($configFile1) ) require_once $configFile1;
    elseif ($configFile2)          require_once $configFile2;
    elseif ($configFile3)          require_once $configFile3;
    
    require_once getCommonFunctions();
    require_once "../db/dataBase.php";
    //require_once "../printForm/printForm.php"; //forms/printForm/printForm.php
    require_once "../forms/printForm/printForm.php";
    require_once "../functions/validate.php";
    require_once "../functions/session.php";
?>

<?php






    ###################################################################################################
    ##################################### FUNCTIONS ###################################################
    ###################################################################################################
    
    /**
     * New
     */
    function actionNew()
    {
        global $id, $nombre, $sourceDbUsers, $msgFile, $msgGoodNew;
        $result = isValidInput('new');
        $saved = false;

        if ( !is_string($result) )
        {
            $array = readCsvAssociative($sourceDbUsers);
            $array[$id] = $nombre;
            $saved = saveCsvAssociative($array, $sourceDbUsers);

            if ($saved)
            { $result = $msgGoodNew; }
    
            file_put_contents($msgFile, $result);
        }
        
        printMainForm($result);
    }




    /**
     * Edit
     */
    function actionEdit()
    {
        global $id, $nombre, $sourceDbUsers, $msgGoodEdit;
        $result = isValidInput('edit');
        $saved = false;

        if ( !is_string($result) )
        {
            $array = readCsvAssociative($sourceDbUsers);
            $array = editCsv($array, $id, $nombre);
            $saved = saveCsvAssociative($array, $sourceDbUsers);

            if ($saved)
            { $result = $msgGoodEdit; }
        }

        printMainForm($result); //crearFormulario($result);
    }




    /**
     * Delete
     */
    function actionDelete()
    {
        global $id, $sourceDbUsers, $msgGoodDelete, $errorUsersFileNotFound;
        $result = isValidInput('delete');
        $saved = false;

        if ( file_exists($sourceDbUsers) )
        {
            if ( !is_string($result) )
            {
                $array = readCsvAssociative($sourceDbUsers);
                unset($array[$id]);
                $saved = saveCsvAssociative($array, $sourceDbUsers);

                if ($saved)
                { $result = $msgGoodDelete; }
            }
        }
        else
        { $result = $errorUsersFileNotFound; }

        printMainForm($result); //crearFormulario($msg);
    }




    /**
     * List
     */
    function actionList()
    {
        global $sourceDbUsers, $msgEmptyListados, $errorUsersFileNotFound, $msgGood;
        $result = '';
        
        if ( file_exists($sourceDbUsers) )
        {
            $array = readCsvAssociative($sourceDbUsers);
        
            if ( reset($array)=='' )
            { $result = $msgEmptyListados; }
        }
        else
        { $result = $errorUsersFileNotFound; }
        
        printMainForm($result);
        listPerson($array);
    }




    /**
     * Login
     */
    function actionLogin()
    {
        /*$user = $_POST["user"];
        $password = $_POST["password"];
        if ( validarInputs() )
        {
            # code...
        }*/

        /**
         * Variables necesarias
         * 
         * global $mainForm :
         * global $loginForm:
         * global $currentUserFile
         * $user            : 
         * $password        : 
         * $sourceDbUsers_users   : 
         * $array           : 
         */
        global $sourceDbCredencials, $errorUsersFileNotFound, $errorLoginFile,     $errorLogin, $errorsFile, $currentUserFile, $found;
        $user = $_POST["user"];
        $password = $_POST["password"];
        $credentials = array($user, $password);
        
        $errorsFile .= "errorLogin.txt";

        if ( file_exists($sourceDbCredencials) )
        {
            $array = readCsvIndexed($sourceDbCredencials);
            $found = findByBothArray(array($user,$password), $array);

            if ($found)
            { 
                //file_put_contents($errorsFile, '');
                file_put_contents('../sources/errors/errorLogin.txt', '');
                saveCurrentUser($credentials, $currentUserFile);
                saveSession('user',$credentials[0]);
                printMainForm();
            } else { 
                //file_put_contents($errorsFile, $errorLogin);
                file_put_contents($errorLoginFile, $errorLogin);
                printLoginForm();
            }
        }
        else
        {
            //$errorUsersFileNotFound = "Hola!";
            //printLoginForm( array(['errorFile']=>$errorUsersFileNotFound ) );
            $errorUsersFileNotFound = "Hola!";
            printLoginForm( array('errorFile' => $errorUsersFileNotFound) );
        }
    }




    /**
     * Logout
     */
    function actionLogout()
    {
        global $currentUserFile;
        saveCurrentUser(array("",""), $currentUserFile);
        printLoginForm('TODO');
    }




    /**
     * Enter Sign up Form
     */
    function actionEnterSignUp()
    {
        header('Location: ../forms/signUpForm/createSignUpForm.php');
    }




    /**
     * Enter Sign up Form
     */
    function actionSignUp()
    {
        if ( is_uploaded_file($_FILES['uploadImage']['tmp_name']) && $_FILES['uploadImage']['error'] == 0) 
        {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["uploadImage"]["name"]);

            if ( move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file) ) 
            {
                echo "La imagen ha sido subida.<br>";
                echo '<img src="'.$target_file.'" alt="océano"/>';
            } else {
                echo "Lo siento, hubo un error al subir tu imagen.";
            }
        } else {
            echo "No se subió ninguna imagen.";
        }
    }


    // TODO
    function listPerson($array)
    {
        echo "Listado de personas: <br>";
        foreach ($array as $item => $value)
        {
            echo "Id: $item, Name: $value <br>";
        }
    }

?>