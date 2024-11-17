<?php
class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "recruitit";

    protected function connect()
    {
        try {
            $connection = mysqli_connect(
                $this->hostname,
                $this->username,
                $this->password,
                $this->database
            );
            return $connection;
        } catch (mysqli_sql_exception $e) {
            die("Connection Failed!" . $e->getMessage());
        }
    }
}
?>
