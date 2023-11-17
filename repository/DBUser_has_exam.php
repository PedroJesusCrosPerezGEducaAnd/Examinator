<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";


class DBUser_has_exam
{

    // ############################################################################################
    // ################################# FIND BY ##################################################
    // ############################################################################################
    // Select *
    static function findByUser_id($user_id) 
    {
        $cn = new DB();
        // Variables
        $arrayExam_id = [];
    
        $sql = "SELECT * FROM user_has_exam WHERE user_id = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
    
        // Process
        $result = $stmt->get_result();
    
        if ($result) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $arrayExam_id[] = $row["exam_id"];
            }
            $stmt->close();
            $cn->close();
        } 
        else 
        {
            return false; // Return boolean false in case of error
        }
    
        return $arrayExam_id;
    }
    




    // ############################################################################################
    // ################################## INSERT ##################################################
    // ############################################################################################
    static function insert($user_id, $exam_id) : bool
    {
        // TODO
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