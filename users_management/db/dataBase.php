<?php
    class dataBase 
    {
        // Properties
        private static $cn=null;
    
        // Methods
        public static function connect() 
        {
            if ( self::$cn == null )
            {
                $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                self::$cn = new PDO('mysql:host=localhost:3305', 'root', 'root', $opc);
            }
            return self::$cn;
        }
    }
?>

<?php

    /**
     * READ FILES
     */
    // $array['pedro']['user']; ==> pedro | $array['pedro']['password']; ==> 123 | $array['pedro']['role']; ==> student
    function readCsv($ubicacion='fichero.csv')
    {
        $rows = array_map(function($row) { return str_getcsv($row, ";"); }, file($ubicacion));
        $header = array_shift($rows);
        $csv = array();
        
        foreach ($rows as $row){
            $csv[$row[0]] = array_combine($header,$row);
        }
        
        return $csv;
    }

    // [ id => people ]
    function readCsvAssociative($ubicacion) 
    {
        $array = array();
        $archivo = fopen($ubicacion, 'r');
        
        if ($archivo) {
            $cabeceras = fgetcsv($archivo, 0, ";");
            
            while (($datos = fgetcsv($archivo, 0, ";")) !== FALSE) {
                $elemento = array_combine($cabeceras, $datos);
                
                if (!isset($array[$elemento['id']])) {
                    $array[$elemento['id']] = $elemento['name'];
                }
            }
            
            fclose($archivo);
        }
        
        return $array;
    }

    // [ ["campo"]=valor , ["campo"]=valor ]
    function readCsvIndexed($ubicacion) 
    {
        $array = array();
        $usuarios = array();
        $archivo = fopen($ubicacion, 'r');
        
        if ($archivo) {
            $cabeceras = fgetcsv($archivo, 0, ";");
            
            while (($datos = fgetcsv($archivo, 0, ";")) !== false) {
                $elemento = array_combine($cabeceras, $datos);
                
                if (!in_array($elemento['user'], $usuarios)) {
                    $array[] = $elemento;
                    $usuarios[] = $elemento['user'];
                }
            }
            
            fclose($archivo);
        }
        
        return $array;
    }
    function readCsvIndexednull($ubicacion)
    {
        $rows = array_map('str_getcsv',file($ubicacion));
        $header = array_shift($rows);
        $csv = array();
        
        foreach ($rows as $row){
            $csv[$row[0]] = array_combine($header,$row);
        }
    }
    function readCsvIndexed1($ubicacion) 
{
    $array = array();
    $archivo = fopen($ubicacion, 'r');
    
    if ($archivo) {
        $cabeceras = fgetcsv($archivo, 0, ";");
        
        while (($datos = fgetcsv($archivo, 0, ";")) !== false) {
            $elemento = array_combine($cabeceras, $datos);
            $array[] = $elemento;
        }
        
        fclose($archivo);
    }
    
    return $array;
}

    function readCsvIndexed_v2($ubicacion) 
    {
        $array = explode( ';', file_get_contents($ubicacion) );
        echo $array[0].'sii'.$array[1];
        //return $array;
    }
    function readCsvIndexed2($ubicacion) {
        $array = array();
        $archivo = fopen($ubicacion, 'r');
        
        if ($archivo) {
            $cabeceras = fgetcsv($archivo, 0, ";");
            
            while (($datos = fgetcsv($archivo, 0, ";")) !== FALSE) {
                $elemento = array_combine($cabeceras, $datos);
                
                // Si el id no está en el array, añadir el elemento al array
                if (!isset($array[$elemento['id']])) {
                    $array[$elemento['id']] = $elemento['name'];
                }
            }
            
            fclose($archivo);
        }
        
        return $array;
    }
    function readCurrentUser($archivo) 
    {
        $contenido = file_get_contents($archivo);
        $array = explode(';', $contenido);
        return $array;
    }




    /**
     * SAVE FILES
     */
    // Esta función impide que haya repetidos, ya que los sustituye
    function saveCsvAssociative($array, $ubicacion) 
    {
        $archivo = fopen($ubicacion, 'w');
        
        if ($archivo) {
            fputcsv($archivo, array('id', 'name'), ";");
            
            foreach ($array as $id => $name) {
                fputcsv($archivo, array($id, $name), ";");
            }
            
            fclose($archivo);
            return true;
        } else {
            return false;
        }
    }
    
    // Este método no sirve para los arrays asociativos prq al guardarlo, no tiene en cuenta los vacíos, los sustituye
    function saveCsvIndexed($array, $ubicacion) 
    {
        $archivo = fopen($ubicacion, 'w');
        
        if ($archivo) {
            fputcsv($archivo, array_keys($array[0]), ";");
            
            foreach ($array as $elemento) {
                fputcsv($archivo, $elemento, ";");
            }
            
            fclose($archivo);
            return true;
        } else {
            return false;
        }
    }

    function saveCurrentUser($array, $ubicacion) 
    {
        $contenido = $array[0] . ';' . $array[1];
        file_put_contents($ubicacion, $contenido);
    }
    



    /**
     * DELETE FILES
     */
    function deleteCsv($array, $id) 
    {
        foreach ($array as $clave => $item) 
        {
            if ($item[1] == $id) 
            {
                unset($array[$clave]);
            }
        }
    
        $array = array_values($array);
    
        return $array;
    }




    /**
     * EDIT FILES
     */
    function editCsv($array, $id, $new_name) 
    {
        if (isset($array[$id])) 
        { $array[$id] = $new_name; }

        return $array;
    }




    /**
     * FindBy
     */
    function findByBothArray($arValues, $array)
    {
        $encontrado = false;

        foreach ($array as $item) 
        {
            if ($item['user'] === $arValues[0] && 
                $item['password'] === $arValues[1])
            {
                $encontrado = true;
                break;
            }
        }

        return $encontrado;
    }

    // Hereda otra función
    function findByBothValues($value1, $value2, $array)
    { return findByBothArray(array($value1, $value2), $array); }
    


    /**
     * SHOW ARRAYS
     */
    function showArrayPeople($array)
    {
        foreach ($array as $item) {
            echo 'Id: ' . $item["id"] . ', Name: ' . $item["name"] . '<br>';
        }
    }

    function showArrayUsers($array)
    {
        foreach ($array as $item) 
        {
            echo 'User: ' . $item["user"] . ', Password: ' . $item["password"] . '<br>';
        }
    }

    
?>