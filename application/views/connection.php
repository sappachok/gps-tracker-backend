<?php
$con= mysqli_connect("localhost","root","","gps-tracker") or die("Error: " . mysqli_error($con));
 
mysqli_query($con, "SET NAMES 'utf8' ");
?>