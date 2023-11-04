<?php
    include_once "helpers/Autoload.php";


if ( $_SERVER['REQUEST_METHOD']=="POST" ) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $found = "false";
    $user = DBUser::findByName($name);


    
    if ( isset($user) && $user[$name]->getPassword() == $password ) 
    {
        //echo "true";
        Session::start();
        Session::save("user",$user);
        switch ($user->getRole()) 
        {
            case 'student':
                header("Location: ?menu=student");
                break;

            case 'teacher':
                header("Location: ?menu=teacher");
                break;

            case 'admin':
                header("Location: ?menu=admin");
                break;
        }
    } /*else {
        header('Content-type: text/html');
        echo "false";
    }*/
    else { echo "ERROR EN API/APIVALIDATELOGIN.PHP"; }
    //header("Location: ?menu=myAccount");
}

?>