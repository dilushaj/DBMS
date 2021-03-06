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
                    Accommodation Manager
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="ui_warden.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class>
                    <a href="ui_change_pass.php">
                        <i class="pe-7s-door-lock"></i>
                        <p>change password</p>
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
                    <a href="../Update/hallUpdateUI.php">
                        <i class="pe-7s-search"></i>
                        <p>Student Details</p>
                    </a>
                </li>
				<li>
                    <a href="../Update/hallUpdateUI.php">
                        <i class="pe-7s-search"></i>
                        <p>Hall Details</p>
                    </a>
                </li>
				<li>
                    <a href="../Update/hallUpdateUI.php">
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
                <form action="ui_change_pass.php" method="post">
    <fieldset>
    <legend><font size="5">Change the password</font></legend>
    <p>
    <label for="UserName:">User Name:</label>
    <input type="text" name="username"/>
<br>	
    </p>
    <p>
    <label for="NewPassWord">New Password:</label>
    <input type="password" name="password1"/>
	<br>
    </p>
	<p>
    <label for="NewPassWord">Confirm New Password  :</label>
    <input type="password" name="password2"/><br>
    </p>
	<p>
	<input type="button" value= "Back" name = "button1" onclick="window.location.href='ui_student.php'"/>
	<input type="submit" value="Save Changes" />
    </p>
	</fieldset>
    </form>
            </div>
        </div>
</body>
</html>

<?php
if ((isset($_POST['username'])) && (isset($_POST['password1'])) && (isset($_POST['password2']))){
	if (!get_magic_quotes_gpc()){
			$user = addslashes($_POST['username']);
			$pass1 = addslashes($_POST['password1']);
			$pass2 = addslashes($_POST['password2']);
	}
	else{
			$user = $_POST['username'];
			$pass1 = $_POST['password1'];
			$pass2 = $_POST['password2'];
	}
	//echo "$user<br>";
	//echo "$pass1<br>";
	//echo "$pass2";

	
	include 'dbCon.php';
	session_start();
	$pass = md5($pass1);
	echo "<br>";
	//echo "connected<br>";
	$result = mysqli_query($conn,"SELECT stu_id FROM student WHERE stu_id='".$user."'");
		if((mysqli_num_rows($result) == 0)) {
			echo '<script language="javascript">';
			echo 'alert("Invalid User")';  //showing an alert box.
			echo '</script>';
			//echo "<font color=\"red\" text-align='center'>Invalid User</font>";
		}
	else if($user==$_SESSION['student_id']){		
	if ("$pass1" == "$pass2"){
		$sql = "UPDATE student SET password='$pass' WHERE stu_id='".$user."'";
        if ($is_query_run1=mysqli_query($conn,$sql)){
			echo '<script language="javascript">';
			echo 'alert("Password updated successfully")';  //showing an alert box.
			echo '</script>';
            
        }
        else{
            echo "<font color=\"red\">Invalid User</font>";  ;
        }
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Password Invalid")';  //showing an alert box.
		echo '</script>';
		//echo "Re enter the password";
	}
	
}
else{
	echo '<script language="javascript">';
	echo 'alert("Invalid User")';  //showing an alert box.
	echo '</script>';
}
}

else{
	//echo '<script language="javascript">';
	//echo 'alert("Please fill all the fields")';  //showing an alert box.
	//echo '</script>';
	//echo "Please fill all the fields";
}

?>