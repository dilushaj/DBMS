<head><?php
include 'dbCon.php';
session_start();
?>
<html>

<head>
    <title> Employee_acc_manager </title>
    <link rel="stylesheet" type="text/css" href="css/css/table.css">
    <link rel="icon" type="image/png" href="css/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="css/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="css/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/css/demo.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' type='text/css'/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/css/pe-icon-7-stroke.css"/>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="green" >

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Administration
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../Hall_Management_warden/acc_home.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="../Hall_Management/ui_add_student.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Add Student</p>
                    </a>
                </li>
                <li class="active">
                    <a href="../Update/updateUI.php">
                        <i class="pe-7s-id"></i>
                        <p>Update Student</p>
                    </a>
                </li>
                <li >
                    <a href="../Hall_Management/ui_add_hall.php">
                        <i class="pe-7s-plus"></i>
                        <p>Add Hall</p>
                    </a>
                </li>
                <li>
                    <a href="../Update/hallUpdateUI.php">
                        <i class="pe-7s-note"></i>
                        <p>Update Hall</p>
                    </a>
                </li>
                <li>
                    <a href="../Hall_Management/ui_add_room.php">
                        <i class="pe-7s-plus"></i>
                        <p>Add Room</p>
                    </a>
                </li>
				<li>
                    <a href="../Update/roomUpdateUI.php">
                        <i class="pe-7s-note"></i>
                        <p>Update Room</p>
                    </a>
                </li>
				<li>
                    <a href="../hm/view_stuRec_for_hall.php">
                        <i class="pe-7s-search"></i>
                        <p>Student Details</p>
                    </a>
                </li>
				<li>
                    <a href="../hm/hall_report.php">
                        <i class="pe-7s-search"></i>
                        <p>Hall Details</p>
                    </a>
                </li>
				<li>
                    <a href="../hm/view_vacant_rooms.php">
                        <i class="pe-7s-search"></i>
                        <p>Vacant Rooms</p>
                    </a>
                </li>
				
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">UNIVERSITY OF SUMANADASA - HALL MANAGEMENT SYSTEM</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../Hall_Management/login.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
</head>
<body>
</body>
<?php
include "dbcon.php";
if(isset($_POST['Submit'])){
	$stu_id =$_POST['stu_id'];
	
function length($inputtxt,$length)  
{     
   $userInput = $inputtxt;    
   if(strlen($userInput) == $length )  
      {       
        return true;      
      }  
   else  
      {                
        return false;     
      }    
}  

$errors="";

//validate data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  

$errors="";
// create a variable

if(empty(test_input($_POST['first_name']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alpha(test_input($_POST['first_name']))== false ){
	$errors="first name should only contain letters";
	echo "<script> alert('error-first name should only contain letters')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$first_name=test_input($_POST['first_name']);
}
if(empty(test_input($_POST['last_name']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alpha(test_input($_POST['last_name']))== false ){
	$errors="Last name should only contain letters";
	echo "<script> alert('error-Last name should only contain letters')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$last_name=test_input($_POST['last_name']);
}

if(test_input(empty($_POST['gender']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$gender=test_input($_POST['gender']);
}


if(empty(test_input($_POST['email']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(filter_var(test_input($_POST['email']),FILTER_VALIDATE_EMAIL)== false ){
	$errors="please enter a valid email address";
	echo "<script> alert('Error-please enter a valid email address')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$email=test_input($_POST['email']);
}
if(empty(test_input($_POST['department']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alpha(test_input($_POST['department']))== false ){
	$errors="please enter a valid weight";
	echo "<script> alert('Error-please enter a valid department')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$department=test_input($_POST['department']);
}
if(empty(test_input($_POST['year']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_digit(test_input($_POST['year']))== false ){
	$errors="Year should only contain letters";
	echo "<script> alert('error-enter a valid year')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$year=test_input($_POST['year']);
}
if(empty(test_input($_POST['room_no']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alnum(test_input($_POST['room_no']))== false ){
	$errors="Enter a valid room number.";
	echo "<script> alert('error-Enter a valid room number.')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$room_no=test_input($_POST['room_no']);
}
if(test_input(empty($_POST['balance_owed']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$balance_owed=test_input($_POST['balance_owed']);
}

if(test_input(empty($_POST['tpNum1']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(length($_POST['tpNum1'],'11')){
	$tpNum1=($_POST['tpNum1']);
}else{
	$errors="error-invalid telephone number.";
	echo "<script> alert('error-Please enter a valid telephone number starting with 94')</script>";
	echo "<script> window.history.go(-1)</script>";
}
if(test_input(!empty($_POST['tpNum2']))){
	if(length($_POST['tpNum2'],'11')){
		$tpNum2=($_POST['tpNum2']);
	}else{
		$errors="error-invalid telephone number.";
		echo "<script> alert('error-Please enter a valid telephone number starting with 94')</script>";
		echo "<script> window.history.go(-1)</script>";
	}
}

$tele = "SELECT * FROM telephone_no_list WHERE user_id='$stu_id'";
$record2=mysqli_query($link,$tele);
	
 if(!$errors){
//Execute the query 
$oldRoom = "SELECT room_no FROM student WHERE stu_id='$stu_id'";
$prevRoom=mysqli_query($link,$oldRoom);
while($row = mysqli_fetch_array($prevRoom)){
		$old_room = $row['room_no'];
		
}
$thisyear=date("Y");
if($old_room != $room_no){
	mysqli_query($link,"INSERT INTO room_assignment('room_no','stu_id','assigned_year') VALUES('$room_no','$stu_id','$thisyear')");
	echo "new room assigned.";
}
mysqli_query($link,"UPDATE student SET first_name='$first_name', last_name='$last_name', gender='$gender',
 email='$email', department='$department', year='$year',room_no='$room_no', balance_owed='$balance_owed' WHERE stu_id='$stu_id'");
if(mysqli_affected_rows($link) > 0){
	echo "<h3>Student infomation updated successfully.</h3>";
}else{
	echo "<h3>Student infomation has not been changed.</h3>";
}

mysqli_query($link,"UPDATE telephone_no_list SET tel_no='$tpNum1' WHERE user_id='$stu_id' limit 1");
if(test_input(!empty($_POST['tpNum2']))){
	if(mysqli_num_rows($record2)== 2){
		mysqli_query($link,"UPDATE telephone_no_list SET tel_no='$tpNum2' WHERE user_id='$stu_id' and tel_no!='$tpNum1'");
	}else{
		mysqli_query($link,"INSERT INTO telephone_no_list(user_id,tel_no) VALUES('$stu_id','$tpNum2')");
		echo "<h3>New phone number added successfully.</h3>";
	}
}

if(mysqli_affected_rows($link) > 0){
	echo "<h3>Student telephone numbers updated successfully.</h3>";
}else{
	echo "<h3>Student telephone numbers have not been changed.</h3>";
}

}
			
}


?>