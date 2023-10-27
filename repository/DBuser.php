<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/entities/User.php";
?>

<?php

// Select *
function findAll ()
{
    try {
        $cn = new mysqli($host, $user, $password, $dbname);
        if ($cn->connect_error) {
            throw new Exception("Error de conexión: " . $cn->connect_error);
        }
    } catch (Exception $e) {

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
    if ($result === true) 
    {
        $nameFields = DB::getNameFields();
        while ($row = $result->fetch_assoc()) 
        {
            $arrUsers[$row["name"]] = new User($row["id"],$row["name"], $row["password"], $row["role"]);
        }
        $connection->close();
    }
    else
    {
        die("Error de consulta: " . $connection->error);
    }
    
    // Return
    return $arUsers;
}


// Select *
function findByName ()
{
    
}

?>