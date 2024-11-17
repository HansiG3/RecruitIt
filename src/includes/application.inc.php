<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $application_date = $_POST["appliaction_date"];
    $status = $_POST["status"];

    if (isset($_SESSION["job_id"])) {
        $job_id = $_SESSION["job_id"];
    } else {
        echo "'job_id' not found in session variable";
        exit();
    }

    if (isset($_SESSION["job_seeker_id"])) {
        $job_seeker_id = $_SESSION["job_seeker_id"];
    } else {
        echo "'job_seeker_id' not found in session variable";
        exit();
    }

    $application = new Application(
        $job_id,
        $job_seeker_id,
        $application_date,
        $status
    );
    $application->insertApplication();
}
?>
