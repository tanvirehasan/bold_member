<?php 

	include "config/conn.php";
	include "config/function.php";

    $select = "SELECT email FROM members WHERE email='tanvir@gmail.com'  ";
    echo mysqli_num_rows(mysqli_query($conn, $select));

?>


