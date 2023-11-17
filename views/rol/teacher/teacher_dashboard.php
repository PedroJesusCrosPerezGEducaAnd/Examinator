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
            printTeacherDashboard("Sitio restringido exclusivamente a profesores.");
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
        
        <a href='".$_SERVER['REQUEST_URI']."&teacher=crud_questions'><button name='crud_questions'>Crud questions</button></a>
        <a href='?rol=teacher&teacher=crud_exams'><button name='crud_exams_dashboard'>Crud exams</button></a>
        ";
    }
    else
    {
        printTeacherDashboard($error);
    }
}

?>

</div>
