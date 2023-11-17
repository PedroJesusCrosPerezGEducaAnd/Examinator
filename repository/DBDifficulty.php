<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

class DBDifficulty
{

    // ###########################################################################################
    // ################################# SELECT * ################################################
    // ###########################################################################################
    // Select *
    static function findAll()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrDifficulty = [];
        $sql = "SELECT * FROM difficulty";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrDifficulty[$row["id"]] = new Difficulty($row["id"],$row["level"]);
        }
        $cn->close();
        
        // Return
        return $arrDifficulty;
    }

    // ############################################################################################
    // ################################# FIND BY ##################################################
    // ############################################################################################
    // Find by difficulty id
    static function findByDifficulty_id($difficulty_id) 
    {
        $cn = new DB();
        $difficulty = null;
    
        $sql = "SELECT * FROM difficulty WHERE id = ?";
        $stmt = $cn->prepare($sql);
        
        $stmt->bind_param("i", $difficulty_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result && $row = $result->fetch_assoc()) {
                $difficulty = new Difficulty($row["id"], $row["level"]);
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    
        $stmt->close();
        $cn->close();
    
        return $difficulty;
    }

}

?>