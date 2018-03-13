<?php 
$conn = new mysqli("localhost","root","","semester_db");
// Check connection
if (mysqli_connect_error()) {
    echo 'alert("db not connected")';
    die("Database connection failed: " . mysqli_connect_error());
 }
 
 ?>

