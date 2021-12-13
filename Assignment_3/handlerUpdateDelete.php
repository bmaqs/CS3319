<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: handlerUpdateDelete.php

        Description: This file switches between updating and deleting a course.
------------->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update Western Course</title>
</head>
<body>
	<?php
		$userAction = $_POST["action"];
		if ($userAction == 'Update') {
			include "updatecourse.php";
		} else {
			include "deletecourse.php";
		}
	?>

</body>
</html>
