<html>
<title> Add new employee </title>
<head><!DOCTYPE html>
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
                <li class = "Active">
                    <a href="../Hall_Management/ui_add_employee.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Add Employee</p>
                    </a>
                </li>
                <li>
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
</html>
<?php include 'dbCon.php';

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
//validate data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  

$errors="";
// create a variable
if(empty(test_input($_POST['id']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$id=$_POST['id'];
}
if(empty(test_input($_POST['firstName']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alpha(test_input($_POST['firstName']))== false ){
	$errors="first name should only contain letters";
	echo "<script> alert('error-first name should only contain letters')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$first_name=test_input($_POST['firstName']);
}
if(empty(test_input($_POST['lastName']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alpha(test_input($_POST['lastName']))== false ){
	$errors="Last name should only contain letters";
	echo "<script> alert('error-Last name should only contain letters')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$last_name=test_input($_POST['lastName']);
}
$today=date_create(date('Y-m-d'));
$dob=date_create($_POST['DOB']);
$diff=date_diff($dob,$today);
if(empty(test_input($_POST['DOB']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if($diff->format("%R%a")<= 0){
	$errors="error-enter a valid date.";
	echo "<script> alert('error-Enter a valid date for date of birth.')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$DOB=test_input($_POST['DOB']);
} 
if(test_input(empty($_POST['gender']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$gender=test_input($_POST['gender']);
}
if(empty(test_input($_POST['age']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$age=test_input($_POST['age']);
}/*
if(empty(test_input($_POST['marital']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$marital=test_input($_POST['marital']);
}
if(empty(test_input($_POST['height']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_digit(test_input($_POST['height']))== false ){
	$errors="please enter a valid height";
	echo "<script> alert('Error-please enter a valid height')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$height=test_input($_POST['height']);
}
if(empty(test_input($_POST['weight']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_digit(test_input($_POST['weight']))== false ){
	$errors="please enter a valid weight";
	echo "<script> alert('Error-please enter a valid weight')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$weight=test_input($_POST['weight']);
}
if(empty(test_input($_POST['shoe']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$shoe=test_input($_POST['shoe']);
}*/
if(test_input(empty($_POST['tpNum1']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(length($_POST['tpNum1'],'11')){
	$tpNum1=($_POST['tpNum1']);
}else{
	$errors="error-invalid id";
	echo "<script> alert('error-Please enter a valid telephone number starting with 94')</script>";
	echo "<script> window.history.go(-1);</script>";
}
if(length($_POST['tpNum2'],'11')){
	$tpNum2=($_POST['tpNum2']);
}
else{
	
}
//edQualifications

//militaryInfo
if(empty(test_input($_POST['position']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alnum(test_input($_POST['position']))== false ){
	$errors="department should only contain letters";
	echo "<script> alert('error-invalid position.')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$position=test_input($_POST['position']);
}

if(empty(test_input($_POST['hall']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$hall=test_input($_POST['hall']);
}


if(empty(test_input($_POST['salary']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	//echo "<script> window.history.go(-1);</script>";
}
$salary=test_input($_POST['salary']);

//Execute the query 
mysqli_query($conn,"INSERT INTO employee(emp_id,emp_first_name,emp_last_name,emp_gender,emp_dob,emp_age,emp_position,emp_salary,emp_hall)
				VALUES('$id','$first_name','$last_name','$gender','$DOB','$age','$position','$salary','$hall')");
				
$date = date("Y-m-d");
mysqli_query($conn,"INSERT INTO hall_assignment (emp_id,hall_id,assigned_date) VALUES ('$id','$hall','$date')");
			
if(mysqli_affected_rows($conn) > 0){
	echo "<h1>Employee added successfully.</h1>";
}else{
	echo "<h1>employee not added.</h1>".$conn->error;
}
?>