<?php
namespace DBUser;
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/entities/User.php";
?>

<?php

// Select *
function findAllIndexed() 
{
    $cn = new DB(); // TODO quitar en el futuro
    // Variables
    $arrUsers = [];
    $nameFields;
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
        echo "Ha entrado<br>";
    }
    else
    {
        echo "Error en consulta<br>";
    }

    return $arrUsers;
}

// Select *
function findAll()
{
    $cn = new DB(); // TODO quitar en el futuro
    // Variables
    $arrUsers = [];
    $nameFields;
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
    $arUsers;
    $nameFields;
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
    return $arUsers;
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
    $nameFields;
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

?>