<?php
//namespace DBUser;
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/entities/User.php";
?>

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



    // Select *
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


    // Select *
    function findByRole($role)
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrUsers = [];
        //$nameFields;
        $sql = "SELECT * FROM user WHERE role = '$role'";
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
    static function update($user) : bool
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $tuples = 0;
        $sql = "INSERT INTO user (name, password, role) VALUES (?, ?, ?)";
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
        $sql = "DELETE FROM user WHERE name = ?";
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
}

?>