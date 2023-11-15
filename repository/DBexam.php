<?php
    require_once "helpers/Autoload.php";



class DBExam
{

    // Select *
    function findAll()
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



    // ##################################################################################################
    // ###################################### Find By ###################################################
    // ##################################################################################################
    // Find By User_id
    function findByUser_id($user_id)
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
    }

}

?>