<?php


class DBUser 
{

    // ############################################################################################
    // ################################## SELECT ##################################################
    // ############################################################################################
    // Select *
    function findAllIndexed() 
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrUsers = [];
        //$nameFields;
        $sql = "SELECT * FROM user";
        $result = $cn->query($sql);

        // Process
        if ($result == true) 
        {
            //$nameFields = ["id", "name", "password", "role"];
            while ($row = $result->fetch_assoc()) 
            {
                $arrUsers[$row["name"]] = new User($row["id"],$row["name"],$row["password"],$row["role"]);
            }
            $cn->close();
        }
        else
        {
            echo "Error en consulta<br>";
        }

        return $arrUsers;
    }

    // Select *
    static function findAll()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrUsers = [];
        //$nameFields;
        $sql = "SELECT * FROM user";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrUsers[$row["name"]] = new User($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $cn->close();
        
        // Return
        return $arrUsers;
    }





    // ############################################################################################
    // ################################## INSERT ##################################################
    // ############################################################################################
    static function insert($user) : bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $reached = false;
        $sql = "INSERT INTO user (name, password, role) VALUES ('" . $user->getName() . "', '" . $user->getPassword() . "', '" . $user->getRole() . "')";
        
        // Proceso
        if ($cn->query($sql) === TRUE) {
            echo "Inserción exitosa";
            $reached = true;
        } else {
            echo "Error al insertar datos: " . $cn->error;
        }

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
        $sql = "UPDATE user SET {$field} = '{$value}' WHERE {$field_id} = '{$value_id}'";
        
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


    static function updateUser($user_id, $user) : int
    {
        $cn = new DB();
        //$sql = "UPDATE user SET {$field} = '{$value}' WHERE id = '{$user_id}'";
        $sql = "UPDATE user SET name = '{$user->getName()}', role = '{$user->getRole()}' WHERE id = {$user_id};";
        
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

    static function updateById($user_id, $name, $role) : int
    {
        $cn = new DB();
        //$sql = "UPDATE user SET {$field} = '{$value}' WHERE id = '{$user_id}'";
        $sql = "UPDATE user SET name = '{$name}', role = '{$role}' WHERE id = {$user_id};";
        
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



    // ############################################################################################
    // ################################## DELETE ##################################################
    // ############################################################################################
    static function delete($id): bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM user WHERE id = ?";
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

    static function deleteByName($name): bool
    {
        $cn = new DB();
        // Variables
        $tuples = 0;
        
        // Consulta SQL para desactivar temporalmente las claves externas
        $sqlDisableFK = "SET foreign_key_checks = 0;";
        $cn->query($sqlDisableFK);
    
        // Consulta SQL para eliminar el usuario por nombre
        $sqlDeleteUser = "DELETE FROM user WHERE name = ?;";
        $stmt = $cn->prepare($sqlDeleteUser);
        $stmt->bind_param("s", $name);
    
        if ($stmt->execute()) {
            echo "Eliminación exitosa";
            $tuples = $stmt->affected_rows;
        } else {
            echo "Error al eliminar: " . $stmt->error;
        }
    
        // Cerrar la conexión
        $stmt->close();
    
        // Consulta SQL para reactivar las claves externas
        $sqlEnableFK = "SET foreign_key_checks = 1;";
        $cn->query($sqlEnableFK);
    
        $cn->close();
    
        // Return
        return $tuples;
    }
    

    static function deleteByName2($name): bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM user WHERE name = ?;";
        $sql1 = "SET foreign_key_checks = 0;";
        $sql1 = "SET foreign_key_checks = 1;";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("s", $name);
    
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
    

    static function deleteById($id) : bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        // Consulta SQL
        $sql = "DELETE FROM user WHERE id = ?";
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
        $user = null;
        $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password';";
        $result = $cn->query($sql);

        // Process
        if ($result == true) 
        {
            //$nameFields = ["id", "name", "password", "role"];
            while ($row = $result->fetch_assoc()) 
            {
                $user = new User($row["id"],$row["name"],$row["password"],$row["role"]);
            }
            $cn->close();
        }
        else
        {
            echo "Error en consulta<br>";
        }

        return $user;
    }
    
    // Find by name
    static function findByName($name) 
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $user = null;
        $sql = "SELECT * FROM user WHERE name = '$name';";
        $result = $cn->query($sql);

        // Process
        if ($result == true) 
        {
            //$nameFields = ["id", "name", "password", "role"];
            while ($row = $result->fetch_assoc()) 
            {
                $user = new User($row["id"],$row["name"],$row["password"],$row["role"]);
            }
            $cn->close();
        }
        else
        {
            echo "Error en consulta<br>";
        }

        return $user;
    }


    static function findByRole($role)
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrUsers = [];
        //$nameFields;
        if ($role == "notnull") { 
            $sql = "SELECT * FROM user WHERE role IS NOT NULL"; 
            //$sql = "SELECT * FROM user WHERE role != 'null' role = 'null';"; 
        } elseif ( $role == "null" ) { 
            $sql = "SELECT * FROM user WHERE role IS NULL || role = 'null'"; 
        } else { 
            $sql = "SELECT * FROM user WHERE role = '$role'"; 
        }
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrUsers[$row["name"]] = new User($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $cn->close();
        
        // Return
        return $arrUsers;
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
        $arrUsers = [];
        //$nameFields;
        $sql = "SELECT * FROM user";
        $result = $cn->query($sql);

        // Proceso
        if ($result == true) 
        {
            //$nameFields = DB::getNameFields("user");
            $nameFields = $cn->getNameFields("user");
            while ($row = $result->fetch_assoc()) 
            {
                $arrUsers[] = new User($row["id"],$row["name"], $row["password"], $row["role"]);
            }
            $cn->close();
        }
        else
        {
            die("Error de consulta: " . $cn->error);
        }
        
        // Return
        return $arrUsers;
    }


    // Select *
    function findAllAssoc ()
    {
        // Comprobación y/o creación de conexión
        if (!DB::isConnected()) 
            $cn = new DB();
        
        // Variables a utilizar
        $arUsers;
        $nameFields;
        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        // Proceso
        $nameFields = DB::getNameFields();
        while ($row = $result->fetch_assoc()) 
        {
            $arrUsers[$row["name"]] = new User($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $connection->close();
        // Return
        return $arUsers;
    }

    

    // Find by role
    static function findByRole2($role)
    {
        $cn = new DB(); // TODO quitar en el futuro

        // Consulta segura utilizando prepared statements
        $sql = "SELECT * FROM user WHERE role = ?";
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
        $stmt->bind_result($id=null, $name, $password, $userRole);

        // Variables
        $arrUsers = [];

        // Proceso
        while ($stmt->fetch()) {
            $arrUsers[] = new User($id, $name, $password, $userRole);
        }

        $cn->close();

        // Return temprano si no hay resultados
        if (empty($arrUsers)) {
            return null;
        }

        // Return
        return $arrUsers;
    }

    static function update3($field, $value, $field_id, $value_id) : int
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        $sql = 'UPDATE user SET {$field} = "{$value}" WHERE {$field_id} = "{$value_id}";';
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