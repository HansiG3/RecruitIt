<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once "../../config/Database.php";
        require_once "../models/Signup.php";

        $login = new Login($username, $password);
        $login->searchUser();
        header("Location: ../views/home.html");
    }
?>