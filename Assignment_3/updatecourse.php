<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: updatecourse.php

        Description: This file updates course info.
------------->


<?php
	include "connecttodb.php";
?>
<?php
	$whichCourse = $_POST['pickawesterncourse'];
	$courseName = $_POST['updatedcoursename'];
	$courseWeight = $_POST['updatedweight'];
	$courseSuffix = $_POST['updatedsuffix'];

	if (!empty($whichCourse) && !empty($courseName)) {
		$updateName = "UPDATE westernCourse SET courseName = '" .$courseName. "'
			WHERE courseNumber = '" .$whichCourse. "'";
		if (mysqli_query($connection,$updateName)) {
			echo "Course name updated <br>";
		} else {
			echo "Course name not updated. Please check input again. <br>";
			echo mysqli_error($connection);
		}
	}
	if (!empty($whichCourse) && !empty($courseWeight)) {
		$updateWeight = "UPDATE westernCourse SET weight = '" .$courseWeight. "'
			WHERE courseNumber = '" .$whichCourse. "'";
		if (mysqli_query($connection,$updateWeight)) {
			echo "Course weight updated <br>";
		} else {
			echo "Course weight not updated. Please check input again. <br>";
			echo mysqli_error($connection);
		}
	}
	if (!empty($whichCourse) && $courseSuffix != 1) {
		$updateSuffix = "UPDATE westernCourse SET suffix = '" .$courseSuffix. "'
			WHERE courseNumber = '" .$whichCourse. "'";
		if (mysqli_query($connection,$updateSuffix)) {
			echo "Course suffix updated <br>";
		} else {
			echo "Course suffix not updated. Please check input again. <br>";
			echo mysqli_error($connection);
		}
	}
	if (empty($whichCourse)){
		echo "Unable to update. Please select a course to update <br>";
	}
	if (empty($courseName) && $courseSuffix == 1 && empty($courseWeight)) {
		echo "No update parameters given. <br>";
	}

	mysqli_close($connection);

	echo '<form action="index.php" method="post">
        	<br>
        	<br>
        	<input type="submit" value="Home">
        	</form>';

?>
	
