<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

class DBCategory
{

    // ###########################################################################################
    // ################################# SELECT * ################################################
    // ###########################################################################################
    // Select *
    static function findAll()
    {
        $cn = new DB(); // TODO quitar en el futuro
        // Variables
        $arrCategory = [];
        $sql = "SELECT * FROM category";
        $result = $cn->query($sql);

        // Proceso
        while ($row = $result->fetch_assoc()) 
        {
            $arrCategory[$row["id"]] = new Category($row["id"],$row["name"]);
        }
        $cn->close();
        
        // Return
        return $arrCategory;
    }


    // ############################################################################################
    // ################################# FIND BY ##################################################
    // ############################################################################################
    // Find by category id
    static function findById($category_id) 
    {
        $cn = new DB();
        $category = null;
    
        $sql = "SELECT * FROM category WHERE id = ?";
        $stmt = $cn->prepare($sql);
        
        $stmt->bind_param("i", $category_id);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
    
            if ($result && $row = $result) {
                $category = new Category($row["id"], $row["name"]);
            }
        } else {
            echo "Error en la consulta: " . $stmt->error;
        }
    
        $stmt->close();
        $cn->close();
    
        return $category;
    }

}

?>