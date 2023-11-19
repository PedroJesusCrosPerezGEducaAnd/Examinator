<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "student" ) 
        {
            echo "
            <div name='student_dashboard'>
                <section>
                    <article>
                        <h2>Bienvenido ".$user->getName()."</h2>
                    </article>
                </section>
            </div>
            ";
        }
        else
        {
            echo "Sitio restringido exclusivamente a estudiantes.";
        }
    }
}
else
{
    echo "Usuario no logeado.";
}
?>