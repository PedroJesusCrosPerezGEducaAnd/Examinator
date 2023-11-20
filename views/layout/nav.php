<?php

if ( Login::isLoged() ) 
{
    switch (Session::read("user")->getRole()) 
    {
        case 'student':
            $nav = "
                <span>
                    <a href='?rol=student&student=dashboard' class='navBtn'>Control panel</a>
                </span>
                <span>
                    <a href='?rol=student&student=pending_exams' class='navBtn'>Examenes pendientes</a>
                </span>
            ";
            break;

        case 'admin':
            $nav = "
            <span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=dashboard' class='navBtn'>Control panel</a>
            <span>
            </span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=pending_exams' class='navBtn'>Pending exams</a>
            </span>
            </span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=crud_questions' class='navBtn'>Create questions</a>
            </span>
            </span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=crud_exams' class='navBtn'>Create exams</a>
            </span>
            <span>
                <a href='".$_SERVER['REQUEST_URI']."&admin=users_requests' class='navBtn'>Users Requests</a>
            </span>
            ";
            break;

        case 'teacher':
            $nav = "
                <span>
                    <a href='?rol=teacher&teacher=dashboard' class='navBtn'>Control panel</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=pending_exams' class='navBtn'>Pending exams</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=crud_questions' class='navBtn'>Create questions</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=crud_exams' class='navBtn'>Create exams</a>
                </span>
                <span>
                    <a href='?rol=teacher&teacher=assign_users_exams' class='navBtn'>Assign users exams</a>
                </span>
            ";
            break;

        default:
            echo "error";
            break;
    }

    echo $nav;
}
else
{
    echo '';
}

?>