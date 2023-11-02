<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/helpers/Autoload.php";
?>

<?php

class Login
{

    static function login($user, $remember)
    {
        Session::startSession();
        Session::saveSession("user", $user);
    }

    static function logout()
    {
        Session::deleteSession("user");
    }

    static function isLoged() 
    {
        return Session::existSession("user");
    }

}

?>