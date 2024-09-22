<?php
	class Employer extends User {
		private $user_id;
		private $company_name;
		private $industry;
		private $location;

		public function __construct($user_id, $company_name, $industry, $location) {
			$this->user_id = $user_id;
			$this->company_name = $company_name;
			$this->industry = $industry;
			$this->location = $location;
		}

		public function insertEmployer() {
			$connection = parent::connect();
			$query = "INSERT INTO employer (user_id, company_name, industry, location) VALUES
			('{$this->user_id}', '{$this->company_name}', '{$this->industry}', '{$this->location}');";
			try {
                mysqli_query($connection, $query);
            }
            catch(mysqli_sql_exception $e) {
                die("Registration Failed!" . $e->getMessage());
            }            
            mysqli_close($connection);
		}
	}
?>