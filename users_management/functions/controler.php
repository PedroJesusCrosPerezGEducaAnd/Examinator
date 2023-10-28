<?php
    /**
     * Libraries
     */
    require_once "../forms/formsFunctions/formActions.php";
    require_once "functions.php";
?>
<?php
    /*
    try {
    } catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    } finally {
    }
    */

    if ( validateRequest() )
    {
        switch (true) 
        {
            case isset($_POST["new"]):
                actionNew();
                break;

            case isset($_POST["edit"]):
                actionEdit();
                break;

            case isset($_POST["delete"]):
                actionDelete();
                break;

            case isset($_POST["listados"]):
                actionList();
                break;

            case isset($_POST["login"]):
                actionLogin();
                break;

            case isset($_POST["logout"]):
                actionLogout();
                break;

            case isset($_POST["enterSignUp"]):
                actionEnterSignUp();
                break;

            case isset($_POST["signUp"]):
                actionSignUp();
                break;
        }
    }
?>