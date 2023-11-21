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
if ( isset($_SERVER["REQUEST_METHOD"]) ) 
{
    switch ($_SERVER["REQUEST_METHOD"]) 
    {
        case 'GET': // SELECT
            $val = new Validator();

            $val->isExist($_GET["exam_has_question"], "_GET[]", "Debes crear la opción ?exam.");
            $val->isEmpty($_GET["exam_has_question"], "_GET[]", "Debes introducir alguna opción de la api en ?exam.");

            /**
             * Creo la respuesta
             */
            if (!$val->isError()) 
            {
                switch ( $_GET["exam_has_question"] ) 
                {
                    case 'findByExam_id':
                        /**
                         * Obtengo datos de la petición de cliente ["examen"]
                         */
                        $exam_id = $_GET["exam"];
    
                        // Declaro Validador
                        $val = new Validator();
                        /**
                         * Valido que sean correctos
                         */
                        $val->isEmpty($exam_id, "exam_id", "Debes introducir el ID de un exámen.");
                        $val->isExist($exam_id, "exam_id", "Debes introducir algún ID de exámen.");
                        $val->isNumeric($exam_id, "exam_id", "Debes introducir un INT, ya que, los ID de exámen en la base de datos son INT.");
                        $exam = DBExam_has_question::findByExam_id( $exam_id );
                        $val->isNull($exam->getExam_id(), "exam", "No se han encontrado exámenes con ese ID");

                        if (!$val->isError()) {
                            $response = new Responsee("true","201","Selected: SELECT query made. ¡Se ha realizado con éxito!.");
                            // RESPONSE
                            echo $response->toJSON();
                            echo json_encode($exam);
                        }
                        elseif ($val->isError()) 
                        {
                            $response = new Responsee("false","404","Not Int: El valor introducido no es válido.");
                            // RESPONSE
                            echo $response->toJSON();
                            echo json_encode($val->getErrors());
                        } 
                        else 
                        {
                            $response = new Responsee("error","500","Internal Server Error: Error interno del servidor, por favor consulta con un adminstrador.");
            
                            echo $response->toJSON();
                        }
                        break;
                    
                    default:
                        echo "Debes introducir alguna opción de la api en ?exam.";
                        break;
                }
            } 
            elseif ($val->isError()) 
            {
                $response = new Responsee("false","404","Not Found: No se ha encontrado valor ?exam_has_question.");
                // RESPONSE
                echo $response->toJSON()."<hr><br>";
                echo json_encode($val->getErrors());
            } 
            else 
            {
                $response = new Responsee("error","500","Internal Server Error: Error interno del servidor, por favor consulta con un adminstrador.");
                // RESPONSE
                echo $response->toJSON()."<hr><br>";
            }
            break;

        case 'POST': // UPDATE
            
            if ( isset($_GET["exam_has_question"]) ) 
            {
                switch ( $_GET["exam_has_question"] ) 
                {
                    case 'findByExam_id':
                        // if ( Login::isLoged() ) 
                        // {
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
                        // }
                        // else
                        // {
                        //     echo json_encode( new Response("Usuario no está logeado") );
                        // }
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
            $data = json_decode(file_get_contents('php://input'), true);
            $response = DBExam_has_question::delete_array_id($data);
            
            echo $response ? json_encode(new Responsee("true")) : json_encode(new Responsee("false"));
            break;
        
        default:
            echo json_encode(['error' => 'Invalid request']);
            break;
    }
}
else
{
    echo "No se ha producido una correcta llamada al servidor en la api: apiExam_has_question.php";
}

?>