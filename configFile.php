<?php

    // ###################################################################################################
    // ########################################## DATA BASE ##############################################
    // ###################################################################################################
    // Datos de conexión a la base de datos
    /**
     * 
     * @param host : host de la base de datos
     * @param user : usuario de la base de datos
     * @param password : contraseña de la base de datos
     * @param dbname : nombre de la base de datos // TODO -> dbexaminator
     */
    $dataBase = [
        "host" => "localhost",
        "user" => "root",
        "password" => "root",
        "dbname" => "examinator"
    ];

class Configfile
{
    static function getDatabase()
    {
        return 
        [
            "host" => "localhost",
            "user" => "root",
            "password" => "root",
            "dbname" => "examinator"
        ];
    }
}



?>