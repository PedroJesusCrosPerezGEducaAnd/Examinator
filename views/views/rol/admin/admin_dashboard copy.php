<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "admin" ) 
        {
            printAdminDashboard("");
        }
        else
        {
            printAdminDashboard("Sitio restringido exclusivamente a administradores.");
        }
    }
}
else
{
    echo "Usuario no logeado.";
}

function printAdminDashboard($error) 
{
    if (empty($error)) 
    {
        echo "
        <div name='admin_dashboard'>
        <section>
            <article>
                <h2>Bienvenido admin</h2>
            </article>
            
            <article>
                <h3>Vista del rol 'admin'</h3>
            </article>
        </section>
    
        <section>
            <article>Article-1</article>
            <article>Article-2</article>
            <article>Article-3</article>
            <article>Article-4</article>
        </section>
        
        <a href='".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']."?admin_menu=users_requests'><button name='users_requests'>Users requests</button></a>
        ";
    }
    else
    {
        printAdminDashboard($error);
    }
}

?>

</div>