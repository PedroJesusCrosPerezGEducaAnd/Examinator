<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && $user->getRole() == "teacher" ) 
        {
            printTeacherDashboard("");
        }
        else
        {
            printTeacherDashboard("Sitio restringido exclusivamente a profesores2.");
        }
    }
}
else
{
    echo "Usuario no logeado.";
}

function printTeacherDashboard($error) 
{
    if (empty($error)) 
    {
        echo "
        <div name='teacher_dashboard'>
        <section>
            <article>
                <h2>Bienvenido teacher</h2>
            </article>
            
            <article>
                <h3>Vista del rol 'teacher'</h3>
            </article>
        </section>
    
        <section>
            <article>Article-1</article>
            <article>Article-2</article>
            <article>Article-3</article>
            <article>Article-4</article>
        </section>
        
        <a href='".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?teacher_menu=crud-questions'><button name='crudQuestions'>Crud preguntas</button></a>
        ";
    }
    else
    {
        printTeacherDashboard("error->teacher_dashboard");
    }
}

?>

</div>
