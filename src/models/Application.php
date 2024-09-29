<?php
class Application extends Database
{
    private $job_id;
    private $job_seeker_id;
    private $application_date;
    private $status;

    public function __construct(
        $job_id,
        $job_seeker_id,
        $application_date,
        $status
    ) {
        $this->job_id = $job_id;
        $this->job_seeker_id = $job_seeker_id;
        $this->application_date = $application_date;
        $this->status = $status;
    }

    public function insertApplication()
    {
        $connection = parent::connect();
        $query = "INSERT INTO application (job_id, job_seeker_id, application_date, status) VALUES
			('{$this->job_id}', '{$this->job_seeker_id}', '{$this->application_date}', '{$this->status}');";
        try {
            mysqli_query($connection, $query);
        } catch (mysqli_sql_exception $e) {
            die("Registration Failed!" . $e->getMessage());
        }
        mysqli_close($connection);
    }
}
?>
