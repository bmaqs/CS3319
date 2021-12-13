<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: formNewEquivalence.php

        Description: This file gets user input for new equivalences between a Western course and external course.
------------->

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Create New Equivalence</title>
</head>
<body>

<?php
        include "connecttodb.php";
?>


<?php

	$query = "SELECT university.universityid AS 'uniCode', university.officialName AS 'uni', outsideCourse.courseCode AS 'code', outsideCourse.courseName AS 'name',
		 outsideCourse.studyYear AS 'studyYear', outsideCourse.weight AS 'weight' 
		FROM outsideCourse 
		INNER JOIN university ON university.universityid = outsideCourse.universityid";


	$result = mysqli_query($connection, $query);
	
	if (!$result){
		echo "hi";
		die("Database error. Unable to get external course data " . mysqli_error($connection));
	}
	$courses = "SELECT courseNumber FROM westernCourse";
        $resultCourses = mysqli_query($connection,$courses);
        if (!$resultCourses) {
                die("database query failed ". mysqli_error($connection));
        }
	echo "<h2>Create New Equivalence</h2>";
                echo "<form action='createEquivalence.php' method='post'>";
			echo "<select name = 'westerncourse' id = 'westerncourse'>";
			echo "<option value = ''>Select Western Course</option>";

			while ($row=mysqli_fetch_assoc($resultCourses)) {
                		echo"<option value='" . $row["courseNumber"] . "'>".$row["courseNumber"]."</option>";
        		}
			echo "</select>";
			echo "<br>";
			echo "<br>";
			echo "<table border = '1'>
                        <tr>
                        <th>Select</th>
                        <th>University Name</th>
			<th>External Course Code</th>
                        <th>External Course Name</th>
                        <th>External Course Study Year</th>
                        <th>External Course Weight</th>
                        </tr>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><input type='radio' id='course' name='course' value='" .$row['uniCode'] . "#" .$row['uni']. "#". $row['code']."'></td>";
				echo "<td>" .$row['uni']. "</td>";
				echo "<td>" .$row['code'] . "</td>";
                                echo "<td>" .$row['name'] . "</td>";
                                echo "<td>" .$row['studyYear'] . "</td>";
                                echo "<td>" .$row['weight'] . "</td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='submit' name='submit' value='Make Equivalent'>";
                	echo "        ";
			echo "<input type='submit' name='submit' value='Cancel'>";
		echo "</form>";
		
		mysqli_close($connection);

?>

</body>
</html>

