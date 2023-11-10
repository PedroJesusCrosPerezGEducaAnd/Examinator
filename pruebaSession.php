<?php
// crossmath juego navegador
require_once "./helpers/Session.php";

Session::save("user","Mi usuario");
$user = Session::read("user");

echo $user;

echo "<br>";
if (Session::exist("user")) 
{
    echo "true";
}
else
{
    echo "false";
}

?>