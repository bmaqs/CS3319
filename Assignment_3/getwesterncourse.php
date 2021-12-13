<!-------------
	Name: Braikhna Yousafzai
	Date: Nov. 25, 2020
	Western ID: byousafz
	
	File: getwesterncourse.php
	
	Description: This file lists all of the Western course data.
------------->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Western Courses</title>
</head>
<body>
<?php
	include 'connecttodb.php';
?>
<?php
 	$attribute=$_POST["orderby"];
	$order=$_POST["order"];
	$query = "SELECT * FROM westernCourse ORDER BY ".$attribute . " ".$order."";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("database query failed.");
	}
	echo "<h1>Western Courses</h1>";
	echo "<table border = '1'>
	<tr>
	<th>Course Number</th>
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

	mysqli_free_result($result);
	
	if(!mysqli_query($connection,$query)) {
		die("Error: query failed" . mysqli_error($connection));
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
