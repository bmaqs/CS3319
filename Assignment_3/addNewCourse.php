<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: addNewCourse.php

        Description: This file adds a new Western course.
------------->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add A Course</title>

</head>
<body>
	<?php
		include "connecttodb.php";
	?>
	<h1>Adding New Course</h1>
	<?php
		$newCourseNum = $_POST["number"];
		$newCourseName = $_POST["name"];
		$newCourseWeight = $_POST["weight"];
		$newCourseSuffix = $_POST["suffix"];

		$findCourse = "SELECT * FROM westernCourse WHERE courseNumber = '" .$newCourseNum . "'";
		$result = mysqli_query($connection, $findCourse);
		if(!result){
			die("Error: unable to add course. Database connection error" . mysqli_error($connection));
		} else if (mysqli_num_rows($result) > 0) {
			echo "<h3>Course already exists. Unable to add.</h3>";
			echo "<table border = '1'>
			<tr>
			<th>Coruse Number</th>
			<th>Course Name</th>
			<th>Weight</th>
			<th>Suffix</th>
			</tr>";
			

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['courseNumber'] . "</td>";
		                echo "<td>" . $row['courseName'] . "</td>";
                		echo "<td>" . $row['weight'] . "</td>";
                		echo "<td>" . $row['suffix'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {

			if(!empty($newCourseNum) && !empty($newCourseName) && !empty($newCourseWeight) && $newCourseSuffix != 1){
				$addCourse = "INSERT INTO westernCourse 
					VALUES('" . $newCourseNum . "', '" . $newCourseName . "', '" . $newCourseWeight . "', '" .$newCourseSuffix ."')";
				if (!mysqli_query($connection, $addCourse)){
					die("Error: unable to add course" . mysqli_error($connection));
				}else{
					echo "Course added <br>";
				}
			} else {
				echo "Unable to add course. Please ensure all fields have been populated <br>";
			}
		}
		mysqli_close($connection);
	?>

<form action="index.php" method="post">
        <br>
        <br>
        <input type="submit" value="Home">
</form>



</body>
</html>
