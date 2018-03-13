<?php 
$link = new mysqli("localhost","root","","semester_db");
// Check connection
if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
 }
 //echo "Connected Successfully";
 ?>
 