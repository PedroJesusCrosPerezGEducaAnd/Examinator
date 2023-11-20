<?php
    require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

class DBExam
{


    // ############################################################################################
    // ################################## SELECT ##################################################
    // ############################################################################################
    static function findAll()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrExams = [];
        $sql = "SELECT * FROM exam";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrExams[] = new Exam($row["id"],$row["date"], $row["user_id"]);
        }
        $cn->close();
        
        // Return
        return $arrExams;
    }

    static function findAllId()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrExams = [];
        $sql = "SELECT * FROM exam";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrExams[] = $row["id"];
        }
        $cn->close();
        
        // Return
        return $arrExams;
    }


    // ############################################################################################
    // ################################## INSERT ##################################################
    // ############################################################################################
    static function insert($exam) : bool
    {
        // Crear una instancia de la clase DB, asumiendo que devuelve un objeto MySQLi
        $cn = new DB(); // TODO quitar en el futuro
    
        // Variables
        $reached = false;
        $sql = "INSERT INTO exam (id, date, user_id) VALUES (?, NOW(), ?)";
    
        // Preparar la consulta
        $stmt = $cn->prepare($sql);
    
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            // Manejar el error, por ejemplo, lanzar una excepción
            throw new Exception("Error preparing statement: " . $cn->error);
        }
    
        // Crear variables temporales
        $id =       $exam->getId();
        //$date =     $exam->getDate();
        $user_id =  $exam->getUser_id();

        // Asociar valores utilizando bind_param
        $stmt->bind_param('ii', $id, /*$date,*/ $user_id);
    
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

    // ##################################################################################################
    // ###################################### Find By ###################################################
    // ##################################################################################################
    static function findLastExam()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $exam = null;
        $sql = "SELECT * FROM exam ORDER BY id DESC LIMIT 1";
        $result = $cn->query($sql);
    
        // Proceso
        if ($result && $row = $result->fetch_assoc()) 
        {
            $exam = new Exam($row["id"], $row["date"], $row["user_id"]);
        }
        $cn->close();
    
        // Return
        return $exam;
    }
    
    // Find by exam id
    static function findByExam_id($exam_id) 
    {
        $cn = new DB();
        // Variables
        $exam = null;
        $arrayQuestion = [];
    
        $sql = "SELECT * FROM exam_has_question WHERE question_id = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $question_id);
        $stmt->execute();
    
        // Process
        $result = $stmt->get_result();
    
        if ($result) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $arrayQuestion[] = new Questionjs( $row["question_id"], $row["statement"], $row["question"], DBDifficulty::findByDifficulty_id($row["difficulty_id"]), DBCategory::findByCategory_id($row["category_id"]) );
            }
            $stmt->close();
            $cn->close();
        } 
        else 
        {
            return false; // Return boolean false in case of error
        }
    
        return new Examjs($exam_id, $arrayQuestion);
    }


    
    // ############################################################################################
    // ################################## UPDATE ##################################################
    // ############################################################################################
    static function update($field, $value, $field_id, $value_id) : bool
    {
        $cn = new DB();
        $sql = "UPDATE exam SET {$field} = '{$value}' WHERE {$field_id} = '{$value_id}'";
        
        if ($cn->query($sql) == true) {
            // Cerrar la conexión
            $cn->close();
            return true;
        } else {
            // Cerrar la conexión
            $cn->close();
            return false;
        }
    }

    

    // ##################################################################################################
    // ####################################### DELETE ###################################################
    // ##################################################################################################
    static function delete($exam_id): bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM exam WHERE id = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $exam_id);

        if ($stmt->execute()) {
            echo "Eliminación exitosa";
            $tuples = $stmt->affected_rows;
        } else {
            echo "Error al eliminar: " . $stmt->error;
        }

        // Cerrar la conexión
        $stmt->close();
        $cn->close();

        // Return
        return $tuples > 0 ? true : false;
    }


    // Find By User_id
    /*function findByUser_id($user_id)
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrExams = [];
        $nameFields;
        $sql = "SELECT * FROM exam WHERE user_id = '$user_id'";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrExams[$row["name"]] = new Exam($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $cn->close();
        
        // Return
        return $arrExams;
    }

    // Find By Date
    function findByDate($dateStart, $dateEnd)
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrExams = [];
        $nameFields;
        $sql = "SELECT * FROM exam WHERE date >= '$dateStart' AND date <= '$dateEnd'";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrExams[$row["name"]] = new Exam($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $cn->close();
        
        // Return
        return $arrExams;
    }*/

}

?>