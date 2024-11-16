<?php
class Job_Seeker extends User
{
    private $user_id;
    private $experience;
    private $skills;

    public function __construct($user_id, $experience, $skills)
    {
        $this->user_id = $user_id;
        $this->experience = $experience;
        $this->skills = $skills;
    }

    public function insertJob_Seeker()
    {
        if (count($this->skills) !== 5) {
            throw new Exception("Exactly 5 skills are required.");
        }

        $connection = parent::connect();
        $query = "INSERT INTO job_seeker (user_id, experience, skill1, skill2, skill3, skill4, skill5) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($query);

        try {
            $stmt->bind_param(
                "iisssss",
                $this->user_id,
                $this->experience,
                $this->skills[0],
                $this->skills[1],
                $this->skills[2],
                $this->skills[3],
                $this->skills[4]
            );
            $stmt->execute();
            $job_seeker_id = $stmt->insert_id;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }

        $stmt->close();
        $connection->close();
        return $job_seeker_id;
    }
}
?>