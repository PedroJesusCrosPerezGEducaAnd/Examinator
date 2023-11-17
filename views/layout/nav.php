<?php

if ( Login::isLoged() ) 
{
    switch (Session::read("user")->getRole()) 
    {
        case 'student':
            $nav = "
                <span>
                    <a href='?rol=student&student=dashboard' class='navBtn'>Panel de control</a>
                </span>
                <span>
                    <a href='?rol=student&student=pending_exams' class='navBtn'>Examenes pendientes</a>
                </span>
            ";
            break;

        case 'admin':
            $nav = "
            <span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=dashboard' class='navBtn'>Panel de control</a>
            </span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=crud_questions' class='navBtn'>Create questions</a>
            </span>
            <span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=users_requests' class='navBtn'>Peticiones</a>
            </span>
            <span>
            ";
            break;

        case 'teacher':
            $nav = "
                <span>
                    <a href='?rol=teacher&teacher=dashboard' class='navBtn'>Panel de control</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=crud_questions' class='navBtn'>Create questions</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=crud_exams' class='navBtn'>Create exams</a>
                </span>
            ";
            break;

        default:
            # code...
            break;
    }

    echo $nav;
}
else
{
    echo '
    <div>
        <h4>Este es el nav</h4>
    </div>
    ';
}

?>