<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: connecttodb.php

        Description: This file connects to a database..
------------->

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "byousafzassign2db";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	die("Database connection failed :" .
	mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
	} //end of if statement
?>
