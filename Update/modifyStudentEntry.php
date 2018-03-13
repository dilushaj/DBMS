
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
                            <a href="login.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid"></head>
<body>
<header><h1 align= "center" > Student Modification</h1></header><br><br>
<font size='5'>Update Student Entry</font><br><br>

<?php
include "dbCon.php";
if(!empty($_POST['stu_id'])){
	$stu_id =$_POST['stu_id'];
	$check="SELECT stu_id FROM student WHERE stu_id='$stu_id'";
	$query=mysqli_query($link,$check);
	if(!mysqli_num_rows($query)==0){
	$sql = "SELECT * FROM student WHERE stu_id='$stu_id'";
	$record1=mysqli_query($link,$sql);
	$tele = "SELECT * FROM telephone_no_list WHERE user_id='$stu_id'";
	$record2=mysqli_query($link,$tele);
	
	
	while($row = mysqli_fetch_array($record1)){
		$first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $gender = $row['gender'];
		$email= $row['email'];
		$department = $row['department'];
		$year = $row['year'];
		$room_no = $row['room_no'];
		$balance_owed = $row['balance_owed'];
	}
	$count=1;
	$tpNum2=null;
	while($tp = mysqli_fetch_array($record2)){
		${'tpNum'.$count} = $tp['tel_no'];
		$count += 1;	
    }
	
?>

<form action="updateStudent.php" method="post">
<input type="hidden" name="stu_id" value="<?=$stu_id;?>">
<fieldset>
<legend>Personal Information</legend> 
First Name: <input type="text" name="first_name" value="<?=$first_name?>"><br>
Last Name: <input type="text" name="last_name" value="<?=$last_name?>"><br>

Gender: <input type="radio" name="gender" value="M" <?php if ($gender == 'M'){ echo 'checked="checked"';} ?>>Male 
<input type="radio" name="gender" value="F" <?php if ($gender == 'F'){ echo 'checked="checked"';} ?> >Female <br>
Email:<input type="text" name="email" value="<?=$email?>" ><br>  
Department: <input type="text" name="department" value="<?=$department?>"><br>
Year: <input type="text" name="year" value="<?=$year?>"><br>
Room number: <input type="text" name="room_no" value="<?=$room_no?>"><br>
Balance owed: <input type="text" name="balance_owed" pattern="([0-9]{1-5}.\d{2})?$/" value="<?=$balance_owed?>"><br>
Telephone Numbers: <input type="text" name="tpNum1" value="<?=$tpNum1?>"><br> 
<input type="text" name="tpNum2" value="<?=$tpNum2?>"><br> 
</fieldset><br><fieldset>

<input type="Submit" name="Submit">
</form>
</body>
<?php
	}else{ echo "ID does not exist.";}
}else{
    echo 'No entry found.';
}
?>