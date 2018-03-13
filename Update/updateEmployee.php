<head><!DOCTYPE html>
<html>
<head>
<head>
    <title> Employee Manager </title>
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
                    <a href="../Hall_Management_warden/emp_home.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="../Hall_Management/ui_add_employee.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Add Employee</p>
                    </a>
                </li>
                <li class = "Active">
                    <a href="../Update/empUpdateUI.php">
                        <i class="pe-7s-note"></i>
                        <p>Update Employee Information</p>
                    </a>
                </li>
                <li >
                    <a href="../Hall_Management/emp_view.php">
                        <i class="pe-7s-note2"></i>
                        <p>View Assigned Employees List</p>
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
<header>
<h3 align= "left" ><b> Update Employee Entry </b></h3>
<!--<logout><button type="button" name="logout" onclick="">Logout </button><logout>-->
</header></body>
<?php
include "dbcon.php";
if(isset($_POST['Submit'])){
	$emp_id =$_POST['emp_id'];
	


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
$today=date_create(date('Y-m-d'));
$dob=date_create($_POST['dob']);
$diff=date_diff($dob,$today);
if(empty(test_input($_POST['dob']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if($diff->format("%R%a")<=0){
	$errors="error-Enter a valid date for date of birth.";
	echo "<script> alert('error-Enter a valid date for date of birth.')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$dob=test_input($_POST['dob']);
}

if(empty(test_input($_POST['position']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alpha(test_input($_POST['position']))== false ){
	$errors="Position should only contain letters";
	echo "<script> alert('error-Position should only contain letters')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$position=test_input($_POST['position']);
}
if(test_input(empty($_POST['salary']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$salary=test_input($_POST['salary']);
}

if(empty(test_input($_POST['hall']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1)</script>";
}else if(ctype_alnum(test_input($_POST['hall']))== false ){
	$errors="Enter a valid hall id.";
	echo "<script> alert('error-Enter a valid hall id.')</script>";
	echo "<script> window.history.go(-1)</script>";
}else{
$hall=test_input($_POST['hall']);
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
$tele = "SELECT * FROM telephone_no_list WHERE user_id='$emp_id'";
$record2=mysqli_query($link,$tele);

if(!$errors){
//Execute the query 
mysqli_query($link,"UPDATE employee SET emp_first_name='$first_name', emp_last_name='$last_name', emp_gender='$gender',
 emp_dob='$dob', emp_position='$position', emp_salary='$salary',emp_hall='$hall' WHERE emp_id='$emp_id'");
if(mysqli_affected_rows($link) > 0){
	echo "<h5>Employee infomation updated successfully.</h5>";
}else{
	echo "<h5>Employee infomation has not been changed.</h5>";
}

mysqli_query($link,"UPDATE telephone_no_list SET tel_no='$tpNum1' WHERE user_id='$emp_id' limit 1");
if(test_input(!empty($_POST['tpNum2']))){
	if(mysqli_num_rows($record2)== 2){
		mysqli_query($link,"UPDATE telephone_no_list SET tel_no='$tpNum2' WHERE user_id='$emp_id' and tel_no!='$tpNum1'");
	}else{
		mysqli_query($link,"INSERT INTO telephone_no_list(user_id,tel_no) VALUES('$emp_id','$tpNum2')");
		echo "<h5>New phone number added successfully.</h5>";
	}
}
if(mysqli_affected_rows($link) > 0){
	echo "<h5>Employee telephone numbers updated successfully.</h5>";
}else{
	echo "<h5>Employee telephone numbers have not been changed.</h5>";
}

//echo "<a href='empUpdateUI.php'> Go Back</a>" ;	
}
			
}