<!-------------
        Name: Braikhna Yousafzai
        Date: Nov. 25, 2020
        Western ID: byousafz

        File: createEquivalence.php

        Description: This file includes queries to update the 
		     equivalences between Western coursesand external courses.
------------->


<?php

	include "connecttodb.php";
?>

<?php

                $action = $_POST['submit'];

                if ($action == "Make Equivalent"){
                        $westernCode = $_POST['westerncourse'];
                        list($uniID, $uniName, $courseCode) = explode('#', $_POST['course']);

                        $isEquivalent = "SELECT * FROM equivalent WHERE westernCourseCode = '" .$westernCode. "' AND externalCourseCode = '" .$courseCode. "' AND
                                universityid = " .$uniID;
                        $resultIsEq = mysqli_query($connection,$isEquivalent);
                        if (!$resultIsEq){
				 die ("Unable to create equivalence " .mysqli_error($connection));
                        }
                        $numResult = mysqli_num_rows($resultIsEq);
                        if ($numResult != 0){
                                $updateDate = "UPDATE equivalent SET decisionDate = CURDATE()
                                 WHERE westernCourseCode = '" .$westernCode. "' AND externalCourseCode = '" .$courseCode. "' AND universityid = " .$uniID;
                                $resultUpdate = mysqli_query($connection,$updateDate);
                                if (!$resultUpdate){
                                        die ("These courses are already equivalent. Unable to update decision date. Database error " .mysqli_error($connection));
                                } else {
                                        echo "These courses are already equivalent <br>";
                                        echo "Decison date updated <br>";
                                }
                        }  else {
                                $newEquivalence = "INSERT INTO equivalent VALUES ('" .$westernCode. "','" .$courseCode. "','" .$uniID. "',CURDATE())";
                                $createEq = mysqli_query($connection,$newEquivalence);

                                if (!$createEq){
					echo "hi";
                                        die ("Unable to create equivalence " .mysqli_error($connection));
                                }

                                echo "Success. " .$westernCode. " is now equivalent to " . $courseCode . " at " .$uniName;

                        }

                        mysqli_close($connection);

                } else if ($action == "Cancel"){
                        header('Location: index.php');
                }
		
		echo '<form action="index.php" method="post">
        	<br>
        	<br>
        	<input type="submit" value="Home">
        	</form>';
?>
