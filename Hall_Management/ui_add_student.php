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
                <form  action="add_stu.php" method="POST">
  <fieldset>
    <legend> <font size="5">Personal information:</font></legend>
	<label> ID </label> <input type="text" name="id" pattern="[0-9]{6}+/[A-Z]{1}"><br><br>
    <label> First name: </label> <input name= "firstName" type='text' required> </input> <br> <br>
    <label> Last name: </label> <input name= "lastName" type='text' required ></input> <br><br>
	<label> Gender:	 </label> <select  name="gender">   
	<option value="M">Male</option>
    <option value="F">Female</option></select><br><br>
	<label> Telephone Number 1(start with 94 instead of 0):  </label> <input type="text" name="tpNum1"><br>
	<label> Telephone Number 2(start with 94 instead of 0):  </label> <input type="text" name="tpNum2"><br><br><br>
	<label> Department: </label><select  name="department">   
	<option value="ENTC">Electronic and Telecommunication Engineering</option>
    <option value="CSE">Computer Science and Engineering</option>
	<option value="CIVIL">Civil Engineering</option>
    <option value="EE">Electrical Engineering</option>
	<option value="CHEM">Chemical and Process Engineering</option>
    <option value="MAT">Material Science Engineering</option>
	<option value="MECH">Mechanical Engineering</option></select>
	<br><br>
	<label> Year: </label> <input type='text' name="year" required> </input> <br><br>
	<label> Email: </label> <input type='text' name="email" required> </input> <br><br>
	<label> Room Number: </label>
	<?php
	$conn1 = new PDO('mysql:host = localhost;dbname=semester_db','root','');
	$sql = "SELECT room_no FROM room where room_status !='occupied'";
	$stmt = $conn1->prepare($sql);
	$stmt->execute();
	$users = $stmt -> fetchAll();
	?>
	<select name="room_no">
  <?php foreach($users as $row):
  ?>
  <option value="<?=$row['room_no'];?>"><?=$row['room_no'];?></option>
  <?php endforeach; ?>
</select><br><br>
	<label> Balance Owed: </label> <input type = "text" name= "balance_owed" pattern="([0-9]{1-5}.\d{2})?$/" required > </input> <br><br>
	
    </fieldset><br>
  <button type="submit" value="Submit" >Submit</button>
</form>
            </div>
        </div>
</body>
</html>

