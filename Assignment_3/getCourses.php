<?php
	include "connecttodb.php";
?>
<?php
	$uni = $_POST['option_value'];
	
	$query = "SELECT courseCode, courseName, studyYear, weight FROM outsideCourse WHERE universityid = " .$uni;
	$result = mysqli_query($connection, $query);
	
	if (!$result) {
		die ("Database connection error: " .mysqli_error($connection));
	}
	
	echo "<h2>Select a course</h2>";
                echo "<form action='createNewEquivalence.php' method = 'post'>";

                        echo "<table border = '1'>
                         <tr>
                        <th>Select</th>
                        <th>External Course Code</th>
                        <th>External Course Name</th>
			<th>External Course Study Year</th>
			<th>External Course Weight</th>
                        </tr>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><input type='radio' id='select' name='code' value='" .$row['courseCode'] . "'></td>";
                                echo "<td>" .$row['courseCode'] . "</td>";
                                echo "<td>" .$row['courseName'] . "</td>";
                                echo "<td>" .$row['studyYear'] . "</td>";
				echo "<td>" .$row['weight'] . "</td>";
				echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";
                        echo "<input type='submit' name='submit' value='Create Equivalence'>";
                echo "</form>";	

?>
