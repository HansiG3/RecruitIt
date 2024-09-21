<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $contact = $_POST["contact"];
        $role = $_POST["role"];

        require_once "../../config/Database.php";
        require_once "../models/Signup.php";
        
        $signup = new Signup($username, $password, $email, $name, $contact, $role);
        $signup->insertUser();
        header("Location: ../views/home.html");
    }
?>