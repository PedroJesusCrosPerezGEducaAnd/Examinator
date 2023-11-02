<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";
?>
<?php

if ( $_SERVER['REQUEST_METHOD']=="POST" ) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $found = "false";
    $user = DBUser::findByName($name);


    
    if ( isset($user) && $user[$name]->getPassword() == $password ) {
        //echo "true";
        switch ($user->getName()) 
        {
            case 'git ':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        header("Location: ?menu=admin");
    } else {
        header('Content-type: text/html');
        echo "false";
    }
}

?>