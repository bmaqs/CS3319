<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: getwesterncoursenumber.php

        Description: This file is a simple query to get Western course numbers.
------------->
<?php
	$query = "SELECT courseNumber FROM westernCourse";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("database query failed.");
	}
	while ($row=mysqli_fetch_assoc($result)) {
		echo"<option value='" . $row["courseNumber"] . "'>".$row["courseNumber"]."</option>";
	}
	mysqli_free_result($result);
?>
