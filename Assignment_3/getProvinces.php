<?php
        $query = "SELECT DISTINCT province FROM university";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("database query failed. " .mysqli_error($connection));
        }
        while ($row=mysqli_fetch_assoc($result)) {
                echo"<option value='" . $row["province"] . "'>".$row["province"]."</option>";
        }
        mysqli_free_result($result);
?>

