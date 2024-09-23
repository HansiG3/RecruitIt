<?php
	class Job_Seeker extends User {
		private $user_id;
		private $experience;
		private $skills;

		public function __construct($user_id, $experience, $skills) {
			$this->user_id = $user_id;
			$this->experience = $experience;
			$this->skills = $skills;
		}

		public function insertJob_Seeker() {
			$connection = parent::connect();
			$query = "INSERT INTO job_seeker (user_id, experience, skills) VALUES
			('{$this->user_id}', '{$this->experience}', '{$this->skills}');";
			try {
                mysqli_query($connection, $query);
				$job_seeker_id = mysqli_insert_id($connection);
            }
            catch(mysqli_sql_exception $e) {
                die("Registration Failed!" . $e->getMessage());
            }            
            mysqli_close($connection);
			return $job_seeker_id;
		}
	};
?>