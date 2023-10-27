<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/configFile.php";
?>
<?php

class DB extends mysqli
{
    // Properties
    private $host;
    private $user;
    private $password;
    private $dbname;


    // Constructor
    function __construct(   $host = null, 
                            $user = null, 
                            $password = null, 
                            $dbname = null
                        )
    {
        global $dataBase;

        $this->host = ($host !== null) ? $host : $dataBase["host"];
        $this->user = ($user !== null) ? $user : $dataBase["user"];
        $this->password = ($password !== null) ? $password : $dataBase["password"];
        $this->dbname = ($dbname !== null) ? $dbname : $dataBase["dbname"];

        parent::__construct($this->host, $this->user, $this->password, $this->dbname);
        $this->setConection($this);
    }


    // Getters y Setters
    public function getHost()
    { return $this->host; }
    private function setHost($host)
    { $this->host = $host; }

    public function getUser()
    { return $this->user; }
    private function setUser($user)
    { $this->user = $user; }

    public function getPassword()
    { return $this->password; }
    private function setPassword($password)
    { $this->password = $password; }

    public function getDBName()
    { return $this->dbname; }
    private function setDBName($dbname)
    { $this->dbname = $dbname; }

    function getConection() 
    { return $this->cn; }
    private function setConection($cn) 
    { return $this->cn = $cn; }




    // Static Methods
/*     public function isConnected() : bool 
    {
        if ($this->getConnection() == true && $this->getConnection() != null)
            return true;
        else
            return false;
    } */

    public function isConnected() 
    {
        return $this->connect_error;
    }

/*     public static function isConnected() : bool 
    {
        if ($this === true && $this !== null)
            return true;
        else
            return false;
    } */

    
    //public static function getNameFields($table) 
    public function getNameFields($table) 
    {
        // Comprobación y/o creación de conexión
        if (!$this->isConnected()) 
            { $cn = new DB(); }

        // Variables a utilizar
        $arr;
        $sql = "DESCRIBE ".$table;
        $result = $cn->query($sql);

        // Proceso
        if ($result === true) 
        {
            while ($row = $result->fetch_row()) 
            {
                $arr[] = $row;
            }
            $connection->close();
        }
        else
        {
            die("Error de consulta: " . $connection->error);
        }

        // Return
        return $arr;
    }

}

?>