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
                $user_id = mysqli_insert_id($connection);
            }
            catch(mysqli_sql_exception $e) {
                die("Registration Failed!" . $e->getMessage());
            }            
            mysqli_close($connection);
            return $user_id;
        }

        public function searchUser() {
            $connection = parent::connect();
            $query = "SELECT username, password FROM user";
            $username_found = false;
            $password_found = false;
            try {
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($this->username == $row["username"]) {
                            $username_found = true;
                            if (password_verify($this->password, $row["password"])) {
                                $password_found = true;
                            }
                            break;
                        }
                    }        
                    if ($username_found == false) {
                        echo "Username '{$this->username}' not found";
                        return false;
                    }
                    else if ($username_found == true && $password_found == false) {
                        echo "Wrong password";
                        return false;
                    }
                    return true;
                }
                else {
                    die("'user' table is empty");
                }
            } 
            catch (mysqli_sql_exception $e) {
                die("Search Failed! " . $e->getMessage());
            }
            mysqli_close($connection);
        }        
    };
?>