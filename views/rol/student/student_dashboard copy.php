<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "student" ) 
        {
            printStudentDashboard( $user->getName());
        }
        else
        {
            printStudentDashboard("Sitio restringido exclusivamente a estudiantes.");
        }
    }
}
else
{
    echo "Usuario no logeado.";
}

function printStudentDashboard($username="") 
{
    if (empty($username)) 
    {
        echo "
        <div name='student_dashboard'>
            <section>
                <article>
                    <h2>Bienvenido ".$username." student</h2>
                </article>
            </section>
        </div>
        ";
    }
    else
    {
        printStudentDashboard($username);
    }
}

?>