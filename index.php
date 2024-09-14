<?php
    session_start();
    require_once "config/Database.php";
    include("index.html");
    $username = $_POST["username"];
    echo "{$username}<br>";
?> 