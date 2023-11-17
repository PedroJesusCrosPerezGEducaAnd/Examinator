<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";


class DBExam_has_question
{

    // ############################################################################################
    // ################################## SELECT ##################################################
    // ############################################################################################
    // Select *
    static function findByExam_id($exam_id)
    {
        $cn = new DB();
        // Variables
        $arrayQuestion = [];
        $question = null;
    
        $sql = "SELECT * FROM exam_has_question WHERE exam_id = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $exam_id);
        $stmt->execute();
    
        // Process
        $result = $stmt->get_result();
    
        if ($result) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $question = DBQuestion::findByQuestion_id($row["question_id"]);
                if ( $question != false ) 
                {
                    $arrayQuestion[] =  new Questionjs(
                                            $row["question_id"], 
                                            $question->getStatement(), 
                                            $question->getQuestion(), 
                                            DBDifficulty::findByDifficulty_id($question->getDifficulty_id()), //new Difficulty(1, "easy"),
                                            DBCategory::findByCategory_id($question->getCategory_id()) //new Category(18, "desarrollo web entorno cliente"),
                                        );
                }
                else
                {
                    $arrayQuestion[] = "error: DBExam_has_question->findByExam_id($exam_id)";
                    throw new Exception("error: DBExam_has_question->findByExam_id($exam_id)");
                }
            }
            $stmt->close();
            $cn->close();
        } 
        else 
        {
            return false; // Return boolean false in case of error
        }
    
        return new Exam_has_question($exam_id, $arrayQuestion);
    }





    // ############################################################################################
    // ################################## INSERT ##################################################
    // ############################################################################################
    static function insert($exam_id, $question_id) : bool
    {
        // Crear una instancia de la clase DB, asumiendo que devuelve un objeto MySQLi
        $cn = new DB(); // TODO quitar en el futuro
    
        // Variables
        $reached = false;
        $sql = "INSERT INTO exam_has_question (exam_id, question_id) VALUES (?, ?)";
    
        // Preparar la consulta
        $stmt = $cn->prepare($sql);
    
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            // Manejar el error, por ejemplo, lanzar una excepción
            throw new Exception("Error preparing statement: " . $cn->error);
        }

        // Asociar valores utilizando bind_param
        $stmt->bind_param('ii', $exam_id, $question_id);
    
        // Ejecutar la consulta
        $stmt->execute();
    
        // Verificar si la ejecución fue exitosa
        if ($stmt->affected_rows > 0) {
            $reached = true;
        }
    
        // Cerrar la conexión (si es necesario)
        $cn->close();
    
        // Return
        return $reached;
    }
    
}

?>