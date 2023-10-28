<?php
    class User {
        /**
         * Properties
         */
        private $name;
        private $password;
        private $role;
        protected static $countUser;
        

        /**
         * Constructor
         */
        function __construct($name,$password,$role)
        {
            $this->setName($name);
            $this->setPassword($password);
            $this->setRole($role);
            self::$countUser++;
        }
        

        /**
         * Destructor
         */
        function __destruct()
        {
            self::$countUser--;
        }


        /**
         * Getters y setters
         */
        public function getName() {
            return $this->name;
        }
        private function setName($name) {
            $this->name = $name;
        }
        public function getPassword() {
            return $this->password;
        }
        private function setPassword($password) {
            $this->password = $password;
        }
        public function getRole() {
            return $this->role;
        }
        private function setRole($role) {
            $this->role = $role;
        }


        /**
         * Methods
         */
        public function getCredentials() {
            return array('name' => $this->getName(), 'password' => $this->getPassword());
        }
    }

?>