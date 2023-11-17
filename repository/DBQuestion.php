<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";


class DBQuestion
{

    // ############################################################################################
    // ################################## SELECT ##################################################
    // ############################################################################################
    // Select *
    static function findAll()
    {
        $cn = new DB();
        // Variables
        $arrQuestions = [];
        //$nameFields;
        $sql = "SELECT * FROM question";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrQuestions[$row["id"]] = new Question($row["id"],$row["statement"], $row["question"], $row["option"], $row["source"], null/*TODO EXAM*/, $row["difficulty_id"], $row["category_id"]);
        }
        $cn->close();
        
        // Return
        return $arrQuestions;
    }





    // ############################################################################################
    // ################################## INSERT ##################################################
    // ############################################################################################
    static function insert($question) : bool
    {
        // Crear una instancia de la clase DB, asumiendo que devuelve un objeto MySQLi
        $cn = new DB(); // TODO quitar en el futuro
    
        // Variables
        $reached = false;
        $sql = "INSERT INTO question (id, date, question, `option`, source, exam_id, difficulty_id, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
        // Preparar la consulta
        $stmt = $cn->prepare($sql);
    
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            // Manejar el error, por ejemplo, lanzar una excepción
            throw new Exception("Error preparing statement: " . $cn->error);
        }
    
        // Crear variables temporales
        $id =               $question->get_id();
        $statement =        $question->getStatement();
        $questionjson =     $question->getQuestionJSON();
        $option =           $question->getOption();
        $source =           $question->getSourceJSON();
        $exam_id =          $question->getExam_id();
        $difficulty_id =    $question->getDifficulty_id();
        $category_id =      $question->getCategory_id();

        // Asociar valores utilizando bind_param
        $stmt->bind_param('issisiii', $id, $statement, $questionjson, $option, $source, $exam_id, $difficulty_id, $category_id);
    
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
    


    // ############################################################################################
    // ################################## UPDATE ##################################################
    // ############################################################################################
    static function update($field, $value, $field_id, $value_id) : bool
    {
        $cn = new DB();
        $sql = "UPDATE question SET {$field} = '{$value}' WHERE {$field_id} = '{$value_id}'";
        
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


    static function updateQuestion($question) : int
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        $sql = "INSERT INTO question (name, password, role) VALUES (?, ?, ?)";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("sss", $name, $password, $role);
        
        if ($stmt->execute()) {
            echo "Inserción exitosa";
            $tuples = $stmt->affected_rows;
        } else {
            echo "Error al insertar datos: " . $stmt->error;
        }
        
        // Cerrar la conexión
        $stmt->close();
        $cn->close();
        
        // Return
        return $tuples;
    }



    // ############################################################################################
    // ################################## DELETE ##################################################
    // ############################################################################################
    static function delete($name) : bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM question WHERE name = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $name);

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
        return $tuples;
    }

    static function deleteBy_id($id) : bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM question WHERE id = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $id);

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
        return $tuples;
    }


    // ############################################################################################
    // ################################# FIND BY ##################################################
    // ############################################################################################
    // Find by question id
    /*static function findByQuestion_id($question_id) 
    {
        $cn = new DB();
        // Variables
        $arrayQuestion = [];
    
        $sql = "SELECT * FROM question WHERE question_id = ?";
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
    
        return $arrayQuestion;
    }*/
    static function findByQuestion_id($question_id) 
    {
        $cn = new DB();
        $question = null;
    
        $sql = "SELECT * FROM question WHERE id = ?";
        $stmt = $cn->prepare($sql);
        
        $stmt->bind_param("i", $question_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result && $row = $result->fetch_assoc()) {
                $question = new Question( $row["id"], $row["statement"], $row["question"], $row["option"], $row["source"], $row["exam_id"], $row["difficulty_id"], $row["category_id"] );
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    
        $stmt->close();
        $cn->close();
    
        return $question;
    }

    // Find by question id
    static function findStatementByQuestion_id($question_id) 
    {
        $cn = new DB();
        $statement = null;
    
        $sql = "SELECT statement FROM question WHERE id = ?";
        $stmt = $cn->prepare($sql);
        
        $stmt->bind_param("i", $question_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result && $row = $result->fetch_assoc()) {
                $statement = $row["statement"];
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    
        $stmt->close();
        $cn->close();
    
        return $statement;
    }
    
    // Find by question id
    static function findQuestionByQuestion_id($question_id) 
    {
        $cn = new DB();
        $question = null;
    
        $sql = "SELECT question FROM question WHERE id = ?";
        $stmt = $cn->prepare($sql);
        
        $stmt->bind_param("i", $question_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result && $row = $result->fetch_assoc()) {
                $question = $row["question"];
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    
        $stmt->close();
        $cn->close();
    
        return $question;
    }
    
}


?>