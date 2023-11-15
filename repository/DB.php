<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/configFile.php";
    //var_dump($dataBase);



class DB extends mysqli
{
    // Properties
    private $host;
    private $user;
    private $password;
    private $dbname;
    private static $cn;


    // Constructor
    function __construct(   $host = null, 
                            $user = null, 
                            $password = null, 
                            $dbname = null
                        )
    {
        global $dataBase;
        //var_dump($dataBase);

        $this->host = ($host !== null) ? $host : "localhost";//$dataBase["host"];
        $this->user = ($user !== null) ? $user : "root";//$dataBase["user"];
        $this->password = ($password !== null) ? $password : "root";//$dataBase["password"];
        $this->dbname = ($dbname !== null) ? $dbname : "examinator";//$dataBase["dbname"];

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

    static function getConection() 
    { return $this->cn; }
    private static function setConection($cn) 
    { return self::$cn = $cn; }




    // Static Methods
/*     public function isConnected() : bool 
    {
        if ($this->getConnection() == true && $this->getConnection() != null)
            return true;
        else
            return false;
    } */

    public function isConnected2() 
    {
        return $this->connect_error;
    }

    public function isConnected() 
    {
        return !$this->connect_error;
    }
    public function isConnectError() 
    {
        return $this->connect_error;
    }
    public static function existConnection() 
    {
        if ( isset(self::$cn) ) 
        {
            return true;
        } else {
            return false;
        }
    }
    public static function existConnection2() 
    {
        if ( $this::getConection() == null ) 
        {
            return true;
        } else {
            return false;
        }
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
        // Variables a utilizar
        $cn = $this->getConection();
        $arr=[];
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
            //die("Error de consulta: " . $connection->error);
            echo "Error en la base de datos";
        }

        // Return
        return $arr;
    }

}

?>