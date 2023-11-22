<?php
/**
 * Cómo utilizar esta api
 * TODO como utilizar apiExam
 * 
 * 
 * 
 *
 * 
 */


// Autoload
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

// Cabeceras
header('Content-Type: application/json');

// Api
switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET': // SELECT
        if ( $_GET["user_has_exam"] ) 
        {
            switch ( $_GET["user_has_exam"] ) 
            {
                case 'findByUser_id':
                    if ( Login::isLoged() ) 
                    {
                        $arrayExams_id = DBUser_has_exam::findByUser_id( Session::read("user")->getId() );
                        $jsonEncoded = json_encode($arrayExams_id);

                        if ($jsonEncoded === false) {
                            echo json_encode(['error' => 'Error encoding JSON: ' . json_last_error_msg()]);
                        } elseif ( empty($arrayExams_id) ) {
                            echo json_encode(false);
                        } else {
                            echo $jsonEncoded;
                        }
                    }
                    else
                    {
                        echo json_encode( new Response("Usuario no está logeado") );
                    }
                    break;

                default:
                    echo json_encode(['error' => 'Invalid operation']);
                    break;
            }
        }
        break;

    case 'POST': // UPDATE
        // TODO: Handle UPDATE request
        break;

    case 'PUT': // INSERT
        // TODO: Handle INSERT request
        break;

    case 'DELETE': // DELETE
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'Not implemented']);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>