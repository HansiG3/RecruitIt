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
            $query = "INSERT INTO employee (username, password, email, name, contact, role) VALUES
            ('{$this->username}', '{$hash}', 'testing@fake.in', 'Kartik Agrawal', 9988776655, 'Designer');";
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