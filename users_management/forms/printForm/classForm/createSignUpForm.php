<?php
    /**
     * Libraries
     */
    $configFile1='configFile.php'; $configFile2='../configFile.php'; $configFile3='../../configFile.php';
    if ( file_exists($configFile1) ) require_once $configFile1;
    elseif ($configFile2)          require_once $configFile2;
    elseif ($configFile3)          require_once $configFile3;

    require_once getCommonFunctions();
?>

<?php
    function createSignUpForm()
    {
        $user = $password = $error = '';
        echo '
            <form enctype="multipart/form-data" action="../../functions/controlador.php" method="post" name="signUpForm">

            <label for="user">User: </label>';
        echo creaInput("user",$user);
        echo '<br><label for="password">Password: </label>';
        echo creaInput("password",$password);
        echo '<br><label for="uploadImage">Upload image: </label>';
        echo creaInput("uploadImage",'');
        echo '<br>'.creaErrorMsg($error);
        echo '<br><br>
            <input type="submit" value="Sign Up" name="signUp">

            </form>
        ';
    }
?>