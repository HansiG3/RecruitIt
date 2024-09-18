<?php
    class Signup extends Database {
        private $username;
        private $password;
        private $email;
        private $name;
        private $contact;
        private $role;

        public function __construct($username, $password, $email, $name, $contact, $role) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->name = $name;
            $this->contact = $contact;
            $this->role = $role;
        }

        public function insertUser() {
            $connection = parent::connect();
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT INTO employee (username, password, email, name, contact, role) VALUES
            ('{$this->username}', '{$hash}', '{$this->name}', '{$this->email}', '{$this->contact}', '{$this->role}');";
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