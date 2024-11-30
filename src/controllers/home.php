<?php
include "../views/navigation.html";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Job Listing</title>
        <link rel="stylesheet" href="../../public/css/home.css" />
        <link rel="stylesheet" href="../../public/css/navigation.css" />
        <link rel="stylesheet" href="../../public/css/box.css" />
        <link rel="stylesheet" href="../../public/css/font.css" />
    </head>

    <body>
        <div class="container noto-sans-warang-citi-regular">
            <div class="filters">
                <div class="getlucky">
                    <p>Get your desired career with Recruit It.</p>
                </div>
                <h3>Filters</h3>
                <div class="filter-group">
                    <label>Working schedule:</label><br />
                    <input type="checkbox" /> Full time<br />
                    <input type="checkbox" /> Part time<br />
                    <input type="checkbox" /> Internship<br />
                    <input type="checkbox" /> Project work<br />
                    <input type="checkbox" /> Volunteering
                </div>
                <div class="filter-group">
                    <label>Employment type:</label><br />
                    <input type="checkbox" /> Full day<br />
                    <input type="checkbox" /> Flexible schedule<br />
                    <input type="checkbox" /> Shift work<br />
                    <input type="checkbox" /> Distant work<br />
                    <input type="checkbox" /> Shift method
                </div>
            </div>

			<div class="job_list">
			<?php
			$connection = mysqli_connect("localhost", "root", "", "recruitit");
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
							<img src="../../public/images/amazon.svg" alt="Amazon Logo" class="company-logo" />
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
			?>
			</div>
        </div>
    </body>
</html>