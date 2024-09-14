<?php
    class Signup extends Database {
        private $username;
        private $password;

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }

        public function insertUser() {
            $connection = parent::connect();
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, password) VALUES
            ('{$this->username}', '{$hash}');";
            try {
                mysqli_query($connection, $query);
            }
            catch(mysqli_sql_exception $e) {
                die("Registration Failed!" . $e->getMessage());
            }
            mysqli_close($connection);
        }
    }
?>