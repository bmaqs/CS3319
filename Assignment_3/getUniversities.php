<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: getUniversities.php

        Description: This file gets university data.
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
		$provCode = $_POST['province'];
		
		$query = "SELECT officialName, nickname FROM university WHERE province = '" .$provCode. "'";
		$result = mysqli_query($connection, $query);

		if(!$result){
			die ("Error: Unable to get universities " .mysqli_error($connection));
	
		}
		
		echo "<h3>Universities in " .$provCode. "</h3>";
        	
		echo "<table border = '1'>
                         <tr>
			<th>Official Name</th>
   	        	<th>Nickname</th>
                        </tr>";

                        while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
	                        echo "<td>" . $row['officialName'] . "</td>";
        	                echo "<td>" . $row['nickname'] . "</td>";
				echo "</tr>";			 
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";



		mysqli_close($connection);
	?>

<form action="index.php" method="post">
        <br>
        <br>
        <input type="submit" value="Home">
</form>


</body>
</head>
