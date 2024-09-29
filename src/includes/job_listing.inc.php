<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $job_type = $_POST["job_type"];
    $salary = $_POST["salary"];
    $posting_date = $_POST["posting_date"];

    if (isset($_SESSION["employer_id"])) {
        $employer_id = $_SESSION["employer_id"];
    } else {
        echo "'employer_id' not found in session variable";
        exit();
    }

    $job_listing = new Job_Listing(
        $employer_id,
        $title,
        $description,
        $location,
        $job_type,
        $salary,
        $posting_date
    );
    $job_id = $job_listing->insertJob_Listing();
    $_SESSION["job_id"] = $job_id;
}
?>
