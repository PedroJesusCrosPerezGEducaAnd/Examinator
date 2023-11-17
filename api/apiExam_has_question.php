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
    case 'POST': // SELECT
        if ( isset($_GET["exam_has_question"]) ) 
        {
            switch ( $_GET["exam_has_question"] ) 
            {
                case 'findByExam_id':
                    if ( Login::isLoged() ) 
                    {
                        $exam_id = json_decode(file_get_contents('php://input'), true);
                        //$exam = DBExam_has_question::findByExam_id( $exam_id );

                        //$jsonEncoded = json_encode($exam);
                        /*if ($jsonEncoded === false) {
                            echo json_encode(['error' => 'Error encoding JSON: ' . json_last_error_msg()]);
                        } elseif ( empty($arrayExams_id) ) {
                            echo "false" . $exam_id . $exam;
                        } else {
                            echo $jsonEncoded . " exam_id:" . $exam_id;
                        }*/
                        //echo $jsonEncoded;

                        echo json_encode(DBExam_has_question::findByExam_id( $exam_id ));
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
        else
        {
            echo json_encode( new Response("Debes introducir una url válida") );
        }
        break;

    case 'GET': // UPDATE
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'GET Not implemented']);
        break;

    case 'PUT': // INSERT
        $questionIdArray = json_decode(file_get_contents('php://input'), true);
        $exam_id = Session::read("exam")->getId();
        //$response = false;

        $length = count($questionIdArray);
        for ($i=0; $i < $length; $i++) { 
            DBExam_has_question::insert($exam_id, $questionIdArray[$i]);
        }
        echo "true"; // Response
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