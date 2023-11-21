<?php

class Validator implements JsonSerializable
{
    // Properties
    private $errors = array();


    // Getters y Setters
    function getErrors() 
    {
        return $this->errors;
    }
    private function setErrors($fieldName, $errorType, $errorMessage) 
    {
        $this->errors[$fieldName][$errorType] = $errorMessage;
    }
    function getError($fieldName, $errorType) 
    { 
        return $this->errors[$fieldName][$errorType]; 
    }


    // Methods
    function isError() 
    {
        return !empty($this->errors);
    }

    function showErrors() {
        if ($this->isError()) {
            $errors = $this->getErrors();
            foreach ($errors as $fieldName => $errorTypes) {
                foreach ($errorTypes as $errorType => $errorMessage) {
                    echo "$fieldName - $errorType: $errorMessage <hr>";
                }
            }
        } else {
            echo "¡¡No se han encontrado errores!! <hr>";
        }
    }


    // ###########################################################################################
    // ############################### Validate ##################################################
    // ###########################################################################################

    // String
    function isString($fieldName, $value, $errorMessage) 
    {
        if (!is_string($value)) 
        {
            $this->setErrors($fieldName, 'isString', $errorMessage);
        }
    }

    function string($fieldName, $value, $errorMessage, $minLength, $maxLength) : bool 
    {
        $isValid = true;
        $regex = '/^.{'.$minLength.','.$maxLength.'}$/';

        if ( !is_string($value) || !preg_match($regex, $value) ) 
        {
            $isValid = false;
            $this->setErrors($fieldName, "stringLength", $errorMessage);
        }

        return $isValid;
    }

    function stringRegex($fieldName, $value, $regex, $errorMessage) : bool 
    {
        $isValid = true;

        if ( !preg_match($regex, $value) ) 
        {
            $isValid = false;
            $this->setErrors($fieldName, "stringRegex", $errorMessage);
        }

        return $isValid;
    }
    
    function stringEnum($fieldName, $value, $arr, $errorMessage) 
    {
        if (!in_array($value, $arr)) 
        {
            $this->setErrors($fieldName, 'stringEnum', $errorMessage);
            return false;
        }

        return true;
    }

    function stringEnum2($fieldName, $value, $arr, $errorMessage) : bool 
    {
        $isValid = true;
        $i=0;
        $length = count($arr);

        while ($i <= $length || $isValid == true) 
        {
            if (!$arr[$i] == $value) 
            {
                $isValid = false;
                $this->setErrors($fieldName, 'stringEnum', $errorMessage);
            }
            
            $i++;
        }

        return $isValid;
    }


    // Int
    function isInt($var, $fieldName, $errorMessage)
    {
        if (!is_int($var)) {
            $this->setErrors($fieldName, "isInt", $errorMessage);
        }
    }

    function isNumeric($var, $fieldName, $errorMessage) {
        if (!is_numeric($var)) {
            $this->setErrors($fieldName, "isNumber", $errorMessage);
        }
    }


    // Others
    function isEmpty($var, $fieldName, $errorMessage)
    {
        if (empty($var)) {
            $this->setErrors($fieldName, 'empty', $errorMessage);
        }
    }

    function isExist($var, $fieldName, $errorMessage)
    {
        if (!isset($var)) {
            $this->setErrors($fieldName, 'exist', $errorMessage);
        }
    }

    function isNotNull($var, $fieldName, $errorMessage) 
    {
        if ($var != null) {
            $this->setErrors($fieldName, 'isNotNull', $errorMessage);
        }
    }

    function isNull($var, $fieldName, $errorMessage) 
    {
        if ($var == null) {
            $this->setErrors($fieldName, 'isNull', $errorMessage);
        }
    }

    // JSON
    static function esJSON($cadena) {
        json_decode($cadena);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    function toJSON() 
    {
        return json_encode(get_object_vars($this));
    }

    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

?>