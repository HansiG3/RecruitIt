<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];

    require_once "../../config/Database.php";
    require_once "../models/User.php";

    $signup = new User($username, $email, $password, $role);
    $user_id = $signup->insertUser();
    $_SESSION["user_id"] = $user_id;
    if ($role == "employer") {
        header("Location: ../controllers/employer.php");
    } else {
        header("Location: ../controllers/job_seeker.php");
    }
    exit();
}
?>
