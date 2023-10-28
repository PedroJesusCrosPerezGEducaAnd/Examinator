<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DB.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/entities/Exam.php";
?>

<?php

// Select *
function findAll()
{
    $cn = new DB(); //$cn = new DB("localhost","root","root","examinator");
    // Variables
    $arrExams = [];
    $sql = "SELECT * FROM exam";
    $result = $cn->query($sql);

    // Proceso
    if ($result == true) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            $arrExams[$row["id"]] = new Exam($row["id"],$row["date"], $row["user_id"]);
        }
        $cn->close();
    }
    else
    {
        echo "Error en consulta<br>";
    }
    
    // Return
    return $arrExams;
}

?>