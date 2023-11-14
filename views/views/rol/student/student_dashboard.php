<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "student" ) 
        {
            printStudentDashboard("");
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

function printStudentDashboard($error) 
{
    if (empty($error)) 
    {
        echo "
        <div name='student_dashboard'>
            <section>
                <article>
                    <h2>Bienvenido student</h2>
                </article>
                
                <article>
                    <h3>Vista del rol 'student'</h3>
                </article>
            </section>
    
            <section>
                <article>Article-1</article>
                <article>Article-2</article>
                <article>Article-3</article>
                <article>Article-4</article>
            </section>
        </div>
        ";
    }
    else
    {
        printStudentDashboard($error);
    }
}

?>