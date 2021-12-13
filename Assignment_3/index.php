<html>
<hr>
<head>
	<title>Western Courses</title>
	<link rel="stylesheet" type="text/css" href="westerncourse.css">
	<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<?php
	include "connecttodb.php";
?>
<h1>Western University Course Equivalency Database</h1>

<form action="getwesterncourse.php" method="post">
	<h2>Show all Western courses</h2>
	<p>Sort courses by:</p>
        <input type="radio" id="courseNumber" name="orderby" value="courseNumber" checked>
        <label for="courseNumber">Course Number</label>
        <input type="radio" id="courseName" name="orderby" value="courseName">
        <label for="courseName">Course Name</label>
        <br>
	<p>Order By:</p>
        <input type="radio" id="asc" name="order" value="asc" checked>
        <label for="asc">Ascending</label>
        <input type="radio" id="desc" name="order" value="desc">
        <label for="desc">Descending</label>
        <br>
	<br>
	<input type="submit" value="Submit">
</form>
<hr>
<hr>
<form action="handlerUpdateDelete.php" method="post" name="updateDelete">
	<h2>Select a course to update or delete</h2>
	<select name="pickawesterncourse" id="pickawesterncourse">
	<option value="">Select here</option>
	<?php
		include "getwesterncoursenumber.php";
	?>
	</select>
	<br>
	<br>
	<label for="updatedcoursename">Updated Course Name:</label>
	<input type="text" id="updatedcoursename" name="updatedcoursename"><br>
	<p>Updated Weight</p>
	<label for="half">0.5</label>
	<input type="radio" id="half" name="updatedweight" value="0.5">
	<label for="full" >1.0</label>
	<input type="radio" id="full" name="updatedweight" value="1.0">
	<br>
	<p>Updated Suffix</p>
	<select name="updatedsuffix" id="updatedsuffix">
	<option value="1">Select here</option>
	<option value="A/B">A/B</option>
	<option value="F/G">F/G</option>
	<option value="E">E</option>
	<option value="Y">Y</option>
	<option value="Z">Z</option>
	<option value="">No suffix</option>
	</select>
	<br>
	<br>
	<input type="submit" name="action" value="Update">
	<input type="submit" name="action" value="Delete">
</form>
<hr>
<hr>
<form action="addNewCourse.php" method="post" name="addNew">
	<h2>Add a new Western course</h2>
	<label for="number">Course Number:</label>
	<input type="text" id="number" name="number" 
	pattern="cs+[0-9]{4}" title="Must begin with 'cs' followed by 4 digits"><br>
	<p>**Course number must begin with "cs"</p>
	<label for="name">Course Name:</label>
        <input type="text" id="name" name="name"><br>
	<p>Weight</p>
  	<label for="half">0.5</label>
        <input type="radio" id="half" name="weight" value="0.5">
        <label for="full" >1.0</label>
        <input type="radio" id="full" name="weight" value="1.0">
        <br>
        <p>Suffix</p>
        <select name="suffix" id="suffix">
        <option value="1">Select here</option>
        <option value="A/B">A/B</option>
        <option value="F/G">F/G</option>
        <option value="E">E</option>
        <option value="Y">Y</option>
        <option value="Z">Z</option>
	<option value="">No suffix</option>
        </select>
	<br>
	<br>
	<input type="submit" name="action" value="Add Course">

</form>
<hr>
<hr>
<form action="getUniversities.php" method="post">
	<h2>Search for Canadian universities by province</h2>
	<select name="province" id="province">
        <option value="">Select here</option>
        <?php
                include "getProvinces.php";
        ?>
        </select>
        <br>
        <br>
	<input type="submit" name="submit" value="Search">
	
</form>
<hr>
<hr>
<form action="searchOtherUni.php" method="post">
	<h2>Search other Canadian universities and courses</h2>
	<input type="submit" name="submit" value="Search courses">
</form>
<hr>
<hr>
<form action="getEquivalencies.php" method="post">
	<h2>Search course equivalencies</h2>
	<select name="pickawesterncourse" id="pickawesterncourse">
        <option value="">Select Western Course</option>
        <?php
                include "getwesterncoursenumber.php";
        ?>
        </select>
        <br>
        <br>
	<input type="submit" name="submit" value="Search Equivalencies">
</form>
<hr>
<hr>
<form action="getEquivalencies.php" method="post">
	<h2>Search course equivalencies by decision date</h2>
	<input type="date" id="decisionDate" name="decisionDate">
	<br>
	<br>
	<input type=submit name="submit" value="Search Equivalencies">
</form>
<hr>
<hr>
<form action="formNewEquivalence.php" method="post" name="newEqInfo">
	<h2>Create new equivalence</h2>
	<input type="submit" name="submit" value="Create new equivalence">
</form>
<hr>
<hr>
<form action="universityNoCourses.php" method="post">
        <h2>Universities without course information</h2>
        <input type="submit" name="submit" value="Search">
</form>


<br>
<br>

</body>
</html>
