<?php
    /**
     * Libraries
     */
    require_once 'classForm/createLoginForm.php';
    require_once 'classForm/createMainForm.php';
    require_once 'classForm/createSignUpForm.php';
?>

<?php

    function printLoginForm( $error='' ) 
    {
        createLoginForm( $error );
    }

    function printMainForm( $error='' ) 
    {
        createMainForm( $error );
    }

    function printSignUpForm( $error='' ) 
    {
        echo '<br><br><br>open sign up form<br><br><br>';//TODO quitar
        createSignUpForm($error);
    }



    function openLoginForm()    { header('Location: classForm/createLoginForm.php'); }
    function openMainForm()     { header('Location: classForm/createMainForm.php'); }
    function openSignUpForm()   { header('Location: classForm/createSignUpForm.php'); }
?>