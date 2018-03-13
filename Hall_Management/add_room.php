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
                <li>
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
                <li class="active">
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
                            <a href="#">
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
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields1')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$id=$_POST['id'];
}

if(test_input(empty($_POST['type']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields2')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$type=test_input($_POST['type']);
}

if(test_input(empty($_POST['status']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields3')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$status=test_input($_POST['status']);
}

if(empty(test_input($_POST['roomCost']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields4')</script>";
	echo "<script> window.history.go(-1);</script>";
}else{
	$roomCost=test_input($_POST['roomCost']);
}

if(empty(test_input($_POST['hall_id']))){
	$errors="error-complete all fields";
	echo "<script> alert('error-complete all fields5')</script>";
	echo "<script> window.history.go(-1);</script>";
}else if(length($_POST['hall_id'],'7')){
	$hall_id=$_POST['hall_id'];
}else{
	$errors="error-invalid id";
	echo "<script> alert('error-please enter a valid ID')</script>";
	echo "<script> window.history.go(-1);</script>";
}



mysqli_query($conn,"INSERT INTO room(room_no,room_cost,room_type,room_status)
				VALUES('$id','$roomCost','$type','$status')");
				
mysqli_query($conn,"INSERT INTO hall_room(room_no,hall_id)
				VALUES('$id','$hall_id')");
				
				
if(mysqli_affected_rows($conn) > 0){
	echo "<h1>Room added successfully.</h1>";
}else{
	echo "<h1>room not added.</h1>".$conn->error;
}


?>
 </div>
        </div>
</body>
</html>