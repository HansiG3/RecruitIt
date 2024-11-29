<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $experience = $_POST["experience"];
    $skills = isset($_POST["skills"]) ? explode(",", $_POST["skills"]) : [];

    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    } else {
        echo "'user_id' not found in session variable";
        exit();
    }

    try {
        if (count($skills) !== 5) {
            throw new Exception("Exactly 5 skills are required.");
        }

        $job_seeker = new Job_Seeker($user_id, $experience, $skills);
        $job_seeker_id = $job_seeker->insertJob_Seeker();
        $_SESSION["job_seeker_id"] = $job_seeker_id;

        header("Location: ../controllers/home.php");
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>
