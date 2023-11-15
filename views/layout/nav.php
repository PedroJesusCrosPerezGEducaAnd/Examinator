<?php

if ( Login::isLoged() ) 
{
    switch (Session::read("user")->getRole()) 
    {
        case 'student':
            $nav = '
            <span><a href=""></a></span>
            ';
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