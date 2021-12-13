<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: universityNoCourse.php

        Description: This file outputs the universities in the database without registered courses attached to them.
------------->

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Universities Without Registered Courses</title>
</head>
<body>

<?php
        include "connecttodb.php";
?>


<?php

	$query = "SELECT university.officialName AS 'official', university.nickname AS 'short' FROM university
		WHERE university.universityid NOT IN (SELECT universityid FROM outsideCourse)";


	$result = mysqli_query($connection,$query);
	
	if (!$result){
		die ("Unable to find university information ". mysqli_error($connection));
	}
	
	echo "<h3>Universities Without Registred Courses</h3>";
        echo "<table border = '1'>
                <tr>
                <th>Official Name</th>
                <th>Nickname</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['official'] . "</td>";
                        echo "<td>" . $row['short'] . "</td>";
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
