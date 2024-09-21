<?php
    class Admin extends Database {
        private $username;
        private $email;
        private $password;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function insertUser() {
            $connection = parent::connect();
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT INTO admin (username, email, password) VALUES
            ('{$this->username}', '{$this->email}', '{$hash}');";
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