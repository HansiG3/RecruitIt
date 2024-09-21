<?php
    class Login extends Database {
        private $username;
        private $password;

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }

        public function searchUser() {
            $connection = parent::connect();
            $query = "SELECT (username, password) FROM employee";
            $username_found = false;
            $password_found = false;
            try {
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($this->username == $row["username"] && $this->password == $row["password"]) {
                            $username_found = true;
                            $password_found = true;
                            break;
                        }
                        else if($this->username == $row["username"] && $this->password != $row["password"]) {
                            $username_found = true;
                            break;
                        }
                    }
                    //find a way to send the info to html
                    if($username_found == false) {
                        echo "Username {$this->username} not found";
                        return false;
                    }
                    else if($username_found == true && $password_found == false) {
                        echo "Wrong password";
                        return false;
                    }
                    return true;
                }
                else
                    die("'employee' table is empty");
            }
            catch(mysqli_sql_exception $e) {
                die("Search Failed!" . $e->getMessage());
            }
            mysqli_close($connection);
        }
    }
?>