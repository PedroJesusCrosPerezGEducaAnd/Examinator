<?php

if ( Login::isLoged() ) 
{
    if ( Session::exist("user") ) 
    {
        $user = Session::read("user");
        
        if (  $user instanceof User && ($user->getRole() == "teacher" || $user->getRole() == "admin") ) 
        {
            echo "
            <div name='teacher_dashboard'>
            <section>
                <article>
                    <h2>Bienvenido ".$user->getName()." teacher</h2>
                </article>
            </section>
            
            <!--<a href='".$_SERVER['REQUEST_URI']."&teacher=crud_questions'><button name='crud_questions'>Crud questions</button></a>
            <a href='?rol=teacher&teacher=crud_exams'><button name='crud_exams_dashboard'>Crud exams</button></a>-->
            ";
        }
        else
        {
            echo "Sitio restringido exclusivamente a profesores.";
        }
    }
}
else
{
    echo "Usuario no logeado.";
}

?>

</div>
