<?php
class Job_Listing extends Employer
{
    private $employer_id;
    private $title;
    private $description;
    private $location;
    private $job_type;
    private $salary;
    private $posting_date;

    public function __construct(
        $employer_id,
        $title,
        $description,
        $location,
        $job_type,
        $salary,
        $posting_date
    ) {
        $this->employer_id = $employer_id;
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->job_type = $job_type;
        $this->salary = $salary;
        $this->posting_date = $posting_date;
    }

    public function insertJob_Listing()
    {
        $connection = parent::connect();
        $query = "INSERT INTO job_listing (employer_id, title, description, location, job_type, salary, posting_date) VALUES
			('{$this->employer_id}', '{$this->title}', '{$this->description}', '{$this->location}', '{$this->job_type}', '{$this->salary}', '{$this->posting_date}');";
        try {
            mysqli_query($connection, $query);
            $job_id = mysqli_insert_id($connection);
        } catch (mysqli_sql_exception $e) {
            die("Registration Failed!" . $e->getMessage());
        }
        mysqli_close($connection);
        return $job_id;
    }

    public function displayJobListings()
    {
        $connection = parent::connect();
        $query = "SELECT * FROM job_listing";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $posting_date = date("d M, Y", strtotime($row["posting_date"]));
            $title = htmlspecialchars($row["title"]);
            $job_type = ucfirst(str_replace("_", " ", $row["job_type"]));
            $salary = number_format($row["salary"], 2);
            $location = htmlspecialchars($row["location"]);

            echo '
            <div class="job-main noto-sans-warang-citi-regular">
                <div class="job-card">
                    <div class="job-header">
                        <p class="posting">' .
                $posting_date .
                '</p>
                    </div>
                    <div class="company-info">
                        <div class="job-info">
                            <h2 class="job-title">' .
                $title .
                '</h2>
                        </div>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon Logo" class="company-logo" />
                    </div>
                    <div class="job-tags">
                        <span>' .
                $job_type .
                '</span>
                    </div>
                </div>
                <div class="job-footer">
                    <div class="salary-place">
                        <p class="rate">$' .
                $salary .
                '/hr</p>
                        <p>' .
                $location .
                '</p>
                    </div>
                    <button class="details-btn">Details</button>
                </div>
            </div>';
        }

        mysqli_close($connection);
    }
}
?>
