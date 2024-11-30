<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "../../config/Database.php";
    require_once "../models/User.php";

    $login = new User($username, null, $password, null, null);
    $login->searchUser();
    $_SESSION["company_name"] = "google";
    header("Location: ../controllers/home.php");
    exit();
}
?>
