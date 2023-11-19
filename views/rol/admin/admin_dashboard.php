<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "admin" ) 
        {
            printAdminDashboard($user->getName());
        }
        else
        {
            echo "Sitio restringido exclusivamente a administradores.";
        }
    }
    else
    {
        echo "Usuario no logeado";
    }
}
else
{
    echo "Usuario no logeado.";
}

function printAdminDashboard($username="") 
{
    if (empty($username)) 
    {
        echo "
        <div name='admin_dashboard'>
        <section>
            <article>
                <h2>Bienvenido ".$username." admin</h2>
            </article>
        </section>

        <!--<a href='".$_SERVER['REQUEST_URI']."&admin=users_requests'><button name='users_requests'>Users requests</button></a>-->
        ";
    }
    else
    {
        printAdminDashboard("");
    }
}

?>

</div>
