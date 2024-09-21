<?php
    class User extends Database {
        private $username;
        private $email;
        private $password;
        private $contact_info;
        private $role;

        public function __construct($username, $email, $password, $contact_info, $role) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->contact_info = $contact_info;
            $this->role = $role;
        }

        public function insertUser() {
            $connection = parent::connect();
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT INTO user (username, email, password, contact_info, role) VALUES
            ('{$this->username}', '{$this->email}', '{$hash}', '{$this->contact_info}', '{$this->role}');";
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