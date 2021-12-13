<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: uniInfo.php

        Description: This file lists info about a Canadian university and its courses.
------------->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>University Course Info</title>
</head>
<body>
	<?php
		include "connecttodb.php";
	?>
	<?php

		$uniCode = $_POST['code'];

		$info = "SELECT officialName, city, province, nickname FROM university WHERE universityid = ". $uniCode;
		$resultInfo = mysqli_query($connection, $info);
		if(!$resultInfo) {
			die("Error: Unable to display info" . mysqli_error($connection));
		}
	
		echo "<h3>University Information</h3>";
        	echo "<table border = '1'>
        	<tr>
        	<th>Official Name</th>
        	<th>City</th>
        	<th>Province</th>
        	<th>Nickname</th>
        	</tr>";

        	while ($row = mysqli_fetch_assoc($resultInfo)) {
                	echo "<tr>";
                	echo "<td>" . $row['officialName'] . "</td>";
                	echo "<td>" . $row['city'] . "</td>";
                	echo "<td>" . $row['province'] . "</td>";
                	echo "<td>" . $row['nickname'] . "</td>";
                	echo "</tr>";
        	}
        	echo "</table>";
		
		$findCourses = "SELECT outsideCourse.courseCode, outsideCourse.courseName, outsideCourse.studyYear, outsideCourse.weight
				FROM outsideCourse
				INNER JOIN university ON outsideCourse.universityid = university.universityid
				WHERE outsideCourse.universityid = " .$uniCode;
		
		$resultCourses = mysqli_query($connection, $findCourses);
		if(!$resultCourses) {

			die ("Error: Unable to get course info " . mysqli_error($connection));
		}
		
		echo "<h3>Courses Offered</h3>";
        	echo "<table border = '1'>
        	<tr>
        	<th>Course Code</th>
        	<th>Course Name</th>
        	<th>Year of Study</th>
        	<th>Weight</th>
        	</tr>";

        	while ($row = mysqli_fetch_assoc($resultCourses)) {
                	echo "<tr>";
                	echo "<td>" . $row['courseCode'] . "</td>";
                	echo "<td>" . $row['courseName'] . "</td>";
                	echo "<td>" . $row['studyYear'] . "</td>";
                	echo "<td>" . $row['weight'] . "</td>";
                	echo "</tr>";
        	}
        	echo "</table>";	

		mysqli_close($connection);
	?>
	
<form action="index.php" method="post">
        <br>
        <br>
        <input type="submit" value="Home">
</form>


</body>
</html>
