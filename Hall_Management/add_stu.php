<?php
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
                
                <li class="active">
                    <a href="ui_add_student.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Add Student</p>
                    </a>
                </li>
                <li>
                    <a href="../Update/updateUI.php">
                        <i class="pe-7s-id"></i>
                        <p>Update Student</p>
                    </a>
                </li>
                <li >
                    <a href="ui_add_hall.php">
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
                    <a href="ui_add_room.php">
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
                            <a href="login.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		<div class="content">
		<div class="container-fluid">
           
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
	$errors="error-complete all fields1";
	echo "<script> alert('error-complete all fields1')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(length($_POST['id'],'7')){
	$id=$_POST['id'];
}else{
	$errors="error-invalid id";
	echo "<script> alert('error-please enter a valid ID')</script>";
	echo "<script> window.history.go(-1);</script>";
}
if(empty(test_input($_POST['firstName']))){
	$errors="error-complete all fields2";
	echo "<script> alert('error-complete all fields2')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alpha(test_input($_POST['firstName']))== false ){
	$errors="first name should only contain letters";
	echo "<script> alert('error-first name should only contain letters')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$first_name=test_input($_POST['firstName']);
}
if(empty(test_input($_POST['lastName']))){
	$errors="error-complete all fields3";
	echo "<script> alert('error-complete all fields3')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alpha(test_input($_POST['lastName']))== false ){
	$errors="Last name should only contain letters";
	echo "<script> alert('error-Last name should only contain letters')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$last_name=test_input($_POST['lastName']);
}
/*
$today=date_create(date('Y-m-d'));
$dob=date_create($_POST['DOB']);
$diff=date_diff($dob,$today);
if(empty(test_input($_POST['DOB']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if($diff->format("%R%a")<0){
	$errors="error-enter a valid date.";
	echo "<script> alert('error-Enter a valid date for date of birth.')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$DOB=test_input($_POST['DOB']);
} */
if(test_input(empty($_POST['gender']))){
	$errors="error-complete all fields4";
	echo "<script> alert('error-complete all fields4')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$gender=test_input($_POST['gender']);
}
/*if(empty(test_input($_POST['age']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$age=test_input($_POST['age']);
}
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
	$errors="error-complete all fields5";
	echo "<script> alert('error-complete all fields5')</script>";
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
if(empty(test_input($_POST['department']))){
	$errors="error-complete all fields6";
	echo "<script> alert('error-complete all fields6')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_alpha(test_input($_POST['department']))== false ){
	$errors="department should only contain letters";
	echo "<script> alert('error-first name should only contain letters')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
$department=test_input($_POST['department']);
}

if(empty(test_input($_POST['email']))){
	$errors="error-complete all fields7";
	echo "<script> alert('error-complete all fields7')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{//if(filter_var(test_input($_POST['email']),filter_validate_email)== false ){
	//echo "<script> alert('enter a valid email address')</script>";
	//echo "<script> window.history.go(-1);</script>";
}
$email=test_input($_POST['email']);


if(empty(test_input($_POST['year']))){
	$errors="error-complete all fields8";
	echo "<script> alert('error-complete all fields8')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(ctype_digit(test_input($_POST['year']))== false ){
	$errors="please enter a valid year";
	echo "<script> alert('Error-please enter a valid height')</script>";
	echo "<script> window.history.go(-1);</script>";
}
$year=test_input($_POST['year']);

if(empty(test_input($_POST['room_no']))){
	$errors="**error-complete all fields";
	echo "<script> alert('error-complete all fields**')</script>";
	echo "<script> window.history.go(-1);</script>";
}
else if(ctype_alnum(test_input($_POST['room_no']))== false ){
	echo "<script> alert('invalid room')</script>";
	//echo "<script> window.history.go(-1);</script>";
	
}
else if (ctype_alnum(test_input($_POST['room_no']))== true){
	$room_no_test=test_input($_POST['room_no']);
	$query = "SELECT room_no FROM room WHERE room_no = '$room_no_test' and (room_status = 'Vacant' or room_status = 'Half-Vacant')";
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) < 1){
		echo "<script> alert('Selected room is already occupied')</script>";
		echo "<script> window.history.go(-1);</script>";
	}
}
else{
	$errors="error-complete all fields";
	echo "<script> alert('Invalid Room')</script>";
	echo "<script> window.history.go(-1);</script>";
}
$room_no=test_input($_POST['room_no']);
//echo $room_no;

if(empty(test_input($_POST['balance_owed']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields10')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	//echo "I am here";
	//echo "<script> window.history.go(-1);</script>";
}
$balance_owed=test_input($_POST['balance_owed']);
$password = md5('hall@123');

//Execute the query 
mysqli_query($conn,"INSERT INTO student(stu_id,password,first_name,last_name,gender,email,department,year,room_no,balance_owed) 
VALUES('$id','$password','$first_name','$last_name','$gender','$email','$department','$year','$room_no','$balance_owed')");

if(mysqli_affected_rows($conn) > 0){
	echo "<h1>Student added successfully.</h1>";
}else{
	echo "<h1>student not added.</h1>".$conn->error;
}


mysqli_query($conn,"INSERT INTO telephone_no_list(user_id,tel_no) values('$id','$tpNum1')");
if(test_input(empty($_POST['tpNum1'])) == false){
	mysqli_query($conn,"INSERT INTO telephone_no_list(user_id,tel_no) values('$id','$tpNum2')");
}
$year_cur = date("Y");
mysqli_query($conn,"INSERT INTO room_assignment(room_no,stu_id,assigned_year) values('$room_no','$id','$year_cur')");

$myresult = mysqli_query($conn,"SELECT * FROM room WHERE room_no = '$room_no_test'");
if ($myresult){
		while($row=mysqli_fetch_array($myresult,MYSQL_ASSOC)){
			if ($row['room_type'] == 'single'){
				mysqli_query($conn,"UPDATE room SET room_status = 'Occupied' where room_no = '$room_no'");
			}
			else if ($row['room_type'] == 'double' and $row['room_status'] == 'Half-Vacant'){
				mysqli_query($conn,"UPDATE room SET room_status = 'Occupied' where room_no = '$room_no'");
			}
			else{
				mysqli_query($conn,"UPDATE room SET room_status = 'Half-Vacant' where room_no = '$room_no'");
			}
		}
	}


				
?>
 </div>
        </div>
</body>
</html>