
 <?php

$user='root';
$pass='';
$db='semester_db';


$conn=mysql_connect('localhost',$user,$pass) or die("unable to connect db1");
@mysql_select_db('semester_db')or die("unable to connect database");
?>