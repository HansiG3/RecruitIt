<?php
	class Job_Listing extends Employer {
		private $employer_id;
		private $title;
		private $description;
		private $location;
		private $job_type;
		private $salary;
		private $posting_date;

		public function __construct($employer_id, $title, $description, $location, $job_type, $salary, $posting_date) {
			$this->employer_id = $employer_id;
			$this->title = $title;
			$this->description = $description;
			$this->location = $location;
			$this->job_type = $job_type;
			$this->salary = $salary;
			$this->posting_date = $posting_date;
		}

		public function insertJob_Listing() {
			$connection = parent::connect();
			$query = "INSERT INTO job_listing (employer_id, title, description, location, job_type, salary, posting_date) VALUES
			('{$this->employer_id}', '{$this->title}', '{$this->description}', '{$this->location}', '{$this->job_type}', '{$this->salary}', '{$this->posting_date}');";
			try {
                mysqli_query($connection, $query);
				$job_id = mysqli_insert_id($connection);
            }
            catch(mysqli_sql_exception $e) {
                die("Registration Failed!" . $e->getMessage());
            }            
            mysqli_close($connection);
			return $job_id;
		}
	};
?>