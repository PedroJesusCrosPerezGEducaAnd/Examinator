<?php
    /**
     * Libraries
     * 
     * problemas de rutas
     */
    //require_once 'configFile.php';

    $configFile1='configFile.php'; $configFile2='../configFile.php'; $configFile3='../../configFile.php';
    if ( file_exists($configFile1) ) require_once $configFile1;
    elseif ($configFile2)          require_once $configFile2;
    elseif ($configFile3)          require_once $configFile3;

    require_once getCommonFunctions();
?>

<?php

    /*function isLoginError()
    {
        
        return $error;
    }*/

    function createLoginForm( $error ) 
    {
        $error=''; //$error = file_get_contents('error.txt'); // TODO take errors
        $user = $password = "";
        //../../../
        echo    '<form action="functions/controler.php" method="post" name="loginForm">

                <label for="user">User: </label> ';
        echo    creaInput("user",$user);
        echo    '<br>';
                if (isset($error['errorUser']))
                { creaErrorMsg(); }
        echo    '<br><label for="password">Password: </label>';
        echo    creaInput("password",$password);
        echo    '<br>';
                if (isset($error['errorPassword']))
                { creaErrorMsg(); }
        echo    '<br>';
                if (isset($error['errorFile']))
                { creaErrorMsg(); }
        echo    '<br><br>
                <input type="submit" value="Login" name="login">
                <input type="submit" value="Sign Up" name="enterSignUp">

                </form>';
    }
?>