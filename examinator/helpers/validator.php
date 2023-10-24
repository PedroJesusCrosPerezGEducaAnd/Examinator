<?php

    class Validator 
    {
        private $errors;


        // Getters y Setters
        function getErrors() 
        { return $this->errors; }
        private function setErrors($fieldName, $errorMessage) 
        { return $this->errors[] = [$fieldName => $errorMessage]; }


        // Methods
        function isError() 
        {
            $isError = true;

            if ($this->getErrors() == "")
                return  false;

            return $isError;
        }

        function getError($campo) 
        {
            
        }

        // Este código lo rescataré en el futuro para intentar hacer pruebas sobre que la propia clase validator sea la que la clase validator ayude a mostrar errores para depurar (por ahora). aunque no debe encargase de ello en el programa futuro
        function pruebas () {
            /*function showErrors() 
            {
                if ($val->isError()) 
                {
                    echo "Se han producido los siguiente errores: <br>";
                    $errors = $val->getErrors();
                    for ($i=0; $i < count($errors); $i++) 
                    { 
                        echo " - ".$errors[$i]-"<br>";
                    }
                }

                echo "Validar string <br>";
                $val = new Validator();

                $name="12345";
                $val->string("name", $name, "El nombre que has introducido es demasiado largo", 6, 30);

                $errors = $val->getErrors();
                $length = count($errors);
                if ($length > 0) {
                    echo "Se han producido los siguientes errores: <br>";
                    for ($i = 0; $i < $length; $i++) {
                        $error = $errors[$i];
                        foreach ($error as $type => $message) {
                            echo " - $type: $message <br>";
                        }
                    }
                }
                else
                {
                    echo "Resultado: ".$name;
                }
            }*/
        }

        // Validate
        function string($fieldName, $value, $errorMessage, $minLength, $maxLength) : bool 
        {
            $isValid = true;
            $regex = '/^.{'.$minLength.','.$maxLength.'}$/';

            if ( !is_string($value) || !preg_match($regex, $value) ) 
            $this->setErrors($fieldName, $errorMessage);

            return $isValid;
        }

        function stringRegex($campo, $string, $regex) : bool 
        {
            $isValid = false;

            if ( preg_match($regex, $string) ) 
                $isValid = true;

            return $isValid;
        }
    }

?>