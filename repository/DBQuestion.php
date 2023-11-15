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
            $arrQuestions[$row["name"]] = new Question($row["id"],$row["name"], $row["password"], $row["role"]);
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
        $sql = "INSERT INTO question (id, statement, question, `option`, source, exam_id, difficulty_id, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
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
    // Find by name and password
    static function findByName_Password($name, $password) 
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $question = null;
        $sql = "SELECT * FROM question WHERE name = '$name' AND password = '$password';";
        $result = $cn->query($sql);

        // Process
        if ($result == true) 
        {
            //$nameFields = ["id", "name", "password", "role"];
            while ($row = $result->fetch_assoc()) 
            {
                $question = new Question($row["id"],$row["name"],$row["password"],$row["role"]);
            }
            $cn->close();
        }
        else
        {
            echo "Error en consulta<br>";
        }

        return $question;
    }
    
    // Find by name
    static function findByName($name) 
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $question = null;
        $sql = "SELECT * FROM question WHERE name = '$name';";
        $result = $cn->query($sql);

        // Process
        if ($result == true) 
        {
            //$nameFields = ["id", "name", "password", "role"];
            while ($row = $result->fetch_assoc()) 
            {
                $question = new Question($row["id"],$row["name"],$row["password"],$row["role"]);
            }
            $cn->close();
        }
        else
        {
            echo "Error en consulta<br>";
        }

        return $question;
    }


    static function findByRole($role)
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrQuestions = [];
        //$nameFields;
        if ($role == "notnull") { 
            $sql = "SELECT * FROM question WHERE role IS NOT NULL"; 
        } else { 
            $sql = "SELECT * FROM question WHERE role = '$role'"; 
        }
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrQuestions[$row["name"]] = new Question($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $cn->close();
        
        // Return
        return $arrQuestions;
    }
}


























/* TODO DBUSER EN UN FUTURO SI ES NECESARIO */



/*     // Select *
    function findAll2()
    {
        try {

            $cn = new DB();
            if ($cn->connect_error) 
            {
                throw new Exception("Error de conexión: " . $cn->connect_error);
            }
        } catch (Exception $e) {
            echo "Ha ocurrido un error: " . $e->getMessage();
        }

        // Comprobación y/o creación de conexión
        if (!$cn->isConnected()) 
            { $cn = new DB(); }
        
        // Variables a utilizar
        $arrQuestions = [];
        //$nameFields;
        $sql = "SELECT * FROM question";
        $result = $cn->query($sql);

        // Proceso
        if ($result == true) 
        {
            //$nameFields = DB::getNameFields("question");
            $nameFields = $cn->getNameFields("question");
            while ($row = $result->fetch_assoc()) 
            {
                $arrQuestions[] = new Question($row["id"],$row["name"], $row["password"], $row["role"]);
            }
            $cn->close();
        }
        else
        {
            die("Error de consulta: " . $cn->error);
        }
        
        // Return
        return $arrQuestions;
    }


    // Select *
    function findAllAssoc ()
    {
        // Comprobación y/o creación de conexión
        if (!DB::isConnected()) 
            $cn = new DB();
        
        // Variables a utilizar
        $arQuestions;
        $nameFields;
        $sql = "SELECT * FROM questions";
        $result = $connection->query($sql);

        // Proceso
        $nameFields = DB::getNameFields();
        while ($row = $result->fetch_assoc()) 
        {
            $arrQuestions[$row["name"]] = new Question($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $connection->close();
        // Return
        return $arQuestions;
    }

    

    // Find by role
    static function findByRole2($role)
    {
        $cn = new DB(); // TODO quitar en el futuro

        // Consulta segura utilizando prepared statements
        $sql = "SELECT * FROM question WHERE role = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("s", $role);
        $stmt->execute();

        // Manejo de errores
        if ($stmt->error) {
            // Aquí puedes manejar el error de acuerdo a tus necesidades
            $cn->close();
            return null;
        }

        // Asignación de resultados directamente a variables
        $stmt->bind_result($id=null, $name, $password, $questionRole);

        // Variables
        $arrQuestions = [];

        // Proceso
        while ($stmt->fetch()) {
            $arrQuestions[] = new Question($id, $name, $password, $questionRole);
        }

        $cn->close();

        // Return temprano si no hay resultados
        if (empty($arrQuestions)) {
            return null;
        }

        // Return
        return $arrQuestions;
    }

    static function update3($field, $value, $field_id, $value_id) : int
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        $sql = 'UPDATE question SET {$field} = "{$value}" WHERE {$field_id} = "{$value_id}";';
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("sss", $name, $password, $role);
        
        if ($cn->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $cn->error;
          }
        
        // Cerrar la conexión
        $stmt->close();
        $cn->close();
        
        // Return
        return $tuples;
    } */
?>