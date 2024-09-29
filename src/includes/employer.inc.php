<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $company_name = $_POST["company_name"];
    $industry = $_POST["industry"];
    $location = $_POST["location"];

    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "'user_id' not found in session variable";
        exit();
    }

    $employer = new Employer($user_id, $company_name, $industry, $location);
    $employer_id = $employer->insertEmployer();
    $_SESSION["employer_id"] = $employer_id;
    header("Location: ../views/home.html");
    exit();
}
?>
