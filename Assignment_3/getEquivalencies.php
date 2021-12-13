<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: getEquivalencies.php

        Description: This file lists outside courses equivalent to a Western course.
------------->

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Universities By Province</title>
</head>
<body>

	<?php
		include "connecttodb.php";
	?>
	<?php
		$whichCourse = $_POST['pickawesterncourse'];
		$whichDate = $_POST['decisionDate'];
		$canSearch = false;
		if (!empty($whichCourse)){
			$canSearch = true;
			$equivalencies = "SELECT westernCourse.courseNumber AS 'code', westernCourse.courseName AS 'name', westernCourse.weight AS 'weight', 
				university.officialName AS 'uniName', 
				outsideCourse.courseCode AS 'outsideCode', outsideCourse.courseName AS 'outsideName', outsideCourse.weight AS 'outsideWeight',  
				equivalent.decisionDate AS 'date'
				FROM equivalent
				INNER JOIN university 
					ON equivalent.universityid = university.universityid
				INNER JOIN outsideCourse 
					ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
				INNER JOIN westernCourse 
					ON equivalent.westernCourseCode = westernCourse.courseNumber
				WHERE westernCourse.courseNumber = '" .$whichCourse. "'";
		} else if (!empty($whichDate)){
			$canSearch = true;
			$equivalencies = "SELECT westernCourse.courseNumber AS 'code', westernCourse.courseName AS 'name', westernCourse.weight AS 'weight',
				university.officialName AS 'uniName',
                                outsideCourse.courseCode AS 'outsideCode', outsideCourse.courseName AS 'outsideName', outsideCourse.weight AS 'outsideWeight',
                                equivalent.decisionDate AS 'date'
                                FROM equivalent
                                INNER JOIN university
                                        ON equivalent.universityid = university.universityid
                                INNER JOIN outsideCourse
                                        ON equivalent.externalCourseCode = outsideCourse.courseCode AND equivalent.universityid = outsideCourse.universityid
                                INNER JOIN westernCourse
                                        ON equivalent.westernCourseCode = westernCourse.courseNumber
                                WHERE equivalent.decisionDate <= '" .$whichDate. "'";
		}
		else {
			echo "No selection criteria provided. <br>";
		}
		if($canSearch == true){
			$resultEquivalencies = mysqli_query($connection, $equivalencies);
		
			if(!$resultEquivalencies) {
				die ("Error: unable to find equivalent courses " . mysqli_error($connection));	
			}	
			echo "<h3>Course Equivalencies</h3>";
        		echo "<table border = '1'>
        		<tr>
			<th>Western Course Number</th>
                	<th>Western Course Name</th>
                	<th>Western Course Weight</th>
        		<th>University</th>
			<th>External Course Number</th>
        		<th>External Course Name</th>
        		<th>External Course Weight</th>
        		<th>Date Equivalence Decided</th>
        		</tr>";

        		while ($row = mysqli_fetch_assoc($resultEquivalencies)) {
                		echo "<tr>";
				echo "<td>" . $row['code'] . "</td>";
                        	echo "<td>" . $row['name'] . "</td>";
                        	echo "<td>" . $row['weight'] . "</td>";
                		echo "<td>" . $row['uniName'] . "</td>";
                		echo "<td>" . $row['outsideCode'] . "</td>";
                		echo "<td>" . $row['outsideName'] . "</td>";
                		echo "<td>" . $row['outsideWeight'] . "</td>";
                		echo "<td>" . $row['date'] . "</td>";
				echo "</tr>";
			}

        		echo "</table>";
	
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
