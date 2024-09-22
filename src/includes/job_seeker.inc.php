<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] === "POST") {
		$experience = $_POST["experience"];
		$skills = $_POST["skills"];

		if(isset($_SESSION["user_id"])) {
			$user_id = $_SESSION["user_id"];
		}
		else {
			echo "'user_id' not found in session variable";
			exit();
		}

		$job_seeker = new Job_Seeker($user_id, $experience, $skills);
		$job_seeker->insertJob_Seeker();
		header("Location: ../views/home.html");
		exit();
	}
?>