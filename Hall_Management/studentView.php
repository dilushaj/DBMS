<?php
include 'dbCon.php';
session_start();
?>
<html>
<head>
<title> View student profile </title>
<head>
    <title> Student </title>
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
                    Student
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../Hall_Management_warden/ui_student.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class>
                    <a href="../Hall_Management/studentView.php">
                        <i class="pe-7s-id"></i>
                        <p>View my profile</p>
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
							
							<a href="stu_change_pass.php">Change Password</a>	
                        </li>
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
</head>
<body>
<br><br>
<form>
<fieldset>
<legend><font size="5"> My Profile</font></legend>
<br>
<?php
//include 'dbCon.php';
//session_start();
$id = $_SESSION['student_id'];

$query="SELECT * FROM student WHERE stu_id='".$id."'";
		if ($is_query_run=mysqli_query($conn,$query)){
			while($row=mysqli_fetch_array($is_query_run,MYSQL_ASSOC)){
				echo "<strong>First Name:</strong>";
				
				echo '<td style="text-align:">' . $row['first_name'] . '</td>';
				echo '<br>';
				echo '<br>';
				echo "Last Name: ";
				echo $row['last_name'];
				echo '<br>';
				echo '<br>';
				echo "Year: ";
				echo $row['year'];
				echo '<br>';
				echo '<br>';
				echo "Gender: ";
				echo $row['gender'];
				echo '<br>';
				echo '<br>';
				echo "Department: ";
				echo $row['department'];
				echo '<br>';
				echo '<br>';
				echo "Email: ";
				echo $row['email'];
				echo '<br>';
				echo '<br>';
				echo "Room: ";
				echo $row['room_no'];
				echo '<br>';
				echo '<br>';
				echo "Balance Owed: ";
				echo $row['balance_owed'];
				echo '<br>';
				echo '<br>';
			}
		}


?>
</fieldset>
</form>
</body>
</html>