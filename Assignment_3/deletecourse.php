<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: deletecourse.php

        Description: This file deletes a western course.
------------->

<!DOCTYPE html>
<html>
<body>

<?php
	include "connecttodb.php";
?>
<?php
	$whichCourse = $_POST["pickawesterncourse"];
	$equivalent = "SELECT externalCourseCode FROM equivalent WHERE westernCourseCode  = '" .$whichCourse. "'";
	$result = mysqli_query($connection,$equivalent);
	if (!$result) {
		die("Query failed. Unable to find course equivalency data." . mysqli_error($connection));
	}
	echo "<h2>Courses equivalent to $whichCourse</h2>";
	if (mysqli_num_rows($result) > 0) {
		echo "<table border = '1'>
		<tr>
		<th>Equivalent Courses At Other Universities</th>
		</tr>";
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['externalCourseCode'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";		

	        mysqli_free_result($result);
	}else {
		echo "Course is not equivalent to any external university courses<br>";
	}

	
?>
<form action="<?php echo $_SERVER['http://cs3319.gaul.csd.uwo.ca/vm235/a3maqsood/handlerUpdateDelete.php'];?>" method="post">
        <h2>Please confirm if you would like to delete the course</h2>
        <input type="submit" id= "confirm" name="confirm" value="Delete">
        <input type="submit" id= "confirm" name="confirm" value="Cancel">
        <input type="hidden" id="courseNum" name="courseNum" value="<?php echo $whichCourse; ?>">
	<br>
        <br>
</form>
<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$formConfirm = $_POST['confirm'];
		if($formConfirm == 'Delete'){
			$course = $_POST['courseNum'];
			$delete = "DELETE FROM westernCourse WHERE courseNumber = '" . $course . "'";
			 if (!mysqli_query($connection, $delete)) {
                        	die ("Unable to delete course " .mysqli_error($connection));
               		} else {
                        	echo "Course deleted <br>";
				echo '<form action="index.php" method="post">
       	 			<br>
        			<br>
        			<input type="submit" value="Home">
        			</form>';
                	}


		} else if ($formConfirm == 'Cancel'){
			header('Location: index.php'); 
		}

	        mysqli_close($connection);		

	}


?>

</body>
</html>
