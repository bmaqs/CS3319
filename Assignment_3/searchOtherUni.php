<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: searchOtherUni.php

        Description: This file lists other universities in Canada.
------------->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Other Universities</title>
</head>
<body>
	<?php
		include "connecttodb.php";
	?>
	<?php
		$listUni = "SELECT universityid, officialName, province FROM university ORDER BY province";
		$result = mysqli_query($connection, $listUni);
		
		if(!result){
			die ("Error: unable to connect to database" . mysqli_error($connection));
		}
		echo "<h2>Select a university</h2>";
		echo "<form action='uniInfo.php' method = 'post'>";

			echo "<table border = '1'>
               		 <tr>
                	<th>Select</th>
                	<th>University Name</th>
                	<th>Province</th>
                	</tr>";

                	while ($row = mysqli_fetch_assoc($result)) {
                        	echo "<tr>";
				echo "<td><input type='radio' id='select' name='code' value='" .$row['universityid'] . "'></td>";
                        	echo "<td>" .$row['officialName'] . "</td>";
                        	echo "<td>" .$row['province'] . "</td>";
                        	echo "</tr>";
                	}
                	echo "</table>";
			echo "<br>";
			echo "<br>";
			echo "<input type='submit' name='submit' value='Search courses'>";
		echo "</form>";

		echo '<form action="index.php" method="post">
        	<br>
        	<br>
        	<input type="submit" value="Home">
        	</form>';

		mysqli_close($connection);
	?>

</body>
</html>
