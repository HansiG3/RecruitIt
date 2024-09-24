<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $role = $_POST["role"];

        require_once "../../config/Database.php";
        require_once "../models/User.php";
        
        $signup = new User($username, $password, $email, $contact, $role);
        $user_id = $signup->insertUser();
        $_SESSION["user_id"] = $user_id;
        if($role == "employer") {
            header("Location: ../views/employer.html");
        }
        else {
            header("Location: ../views/job_seeker.html");
        }
        exit();
    }
?>