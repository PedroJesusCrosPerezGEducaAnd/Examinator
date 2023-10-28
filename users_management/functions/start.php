<?php
    /**
     * Libraries
     */
    //require_once 'forms/formsFunctions/commonFunctions.php';
    require_once 'functions/login.php';

    require_once 'forms/printForm/printForm.php';
    require_once 'configFile.php';
?>

<?php
    function start()
    { 
        if ( isLoged() )
            printMainForm();
        else
            printLoginForm();
    }

    /*function start_old()
    { 
        global $currentUserFile, $mainForm, $loginForm;

        if ( isLoged($currentUserFile) )
            printMainForm();
        else
            printLoginForm();
    }*/
?>
