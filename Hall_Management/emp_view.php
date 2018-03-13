<html>
    <head>
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
                <li>
                    <a href="../Update/empUpdateUI.php">
                        <i class="pe-7s-note"></i>
                        <p>Update Employee Information</p>
                    </a>
                </li>
                <li class = "Active">
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
            <div class="container-fluid"></head>
    
    <body>
		<br>
        
    <form action="emp_view.php" method="get">
	<fieldset>
	<legend><font size="5">View Employee Details</font></legend>
    <p>
    <label for="Hall ID">Select the hall ID : </label>
	<?php
	$conn1 = new PDO('mysql:host = localhost;dbname=semester_db','root','');
	$sql = "SELECT hall_id FROM hall";
	$stmt = $conn1->prepare($sql);
	$stmt->execute();
	$users = $stmt -> fetchAll();
	
	?>
	<select name="id">
  <option value="All">All Halls</option>
  <?php foreach($users as $row):
  ?>
  <option value="<?=$row['hall_id'];?>"><?=$row['hall_id'];?></option>
  <?php endforeach; ?>
</select>
	<label for="Poition">Enter the Position : </label>
    <select name="position">
  <option value="All">All Positions</option>
  <option value="Cook">Cook</option>
  <option value="Guard">Guard</option>
  <option value="Other1">Other1</option>
  <option value="Other1">Other2</option>
  <option value="Other1">Other3</option>
  <option value="Other1">Other4</option>
</select>
  <br>
		<input type="submit" name="submit_button" value="Submit" />
		
        </p>
		</fieldset>
        </form>
</body>
</html>

<?php
if (isset($_GET["id"])){
	include 'dbCon.php';
	
	if (!get_magic_quotes_gpc()){
		
		$new_hall = addslashes($_GET["id"]);
		if (isset($_GET["position"])){
			$new_pos = addslashes($_GET["position"]);
	}
	}
	else{
		$new_hall = $_GET["id"];
		if (isset($_GET["position"])){
			$new_pos = $_GET["position"];
	}
	}
	//echo "<br>";
	//echo "connected<br>";
	if ($new_hall != 'All' and $new_pos != 'All'){
		$query="SELECT * FROM employee WHERE emp_hall ='".$new_hall."' and emp_position ='".$new_pos."'";
	}
	
	else if ($new_hall != 'All' and $new_pos == 'All'){
		$query="SELECT * FROM employee WHERE emp_hall ='".$new_hall."'";
	}
	else if ($new_hall == 'All' and $new_pos != 'All'){
		$query="SELECT * FROM employee WHERE emp_position ='".$new_pos."'";
	}
	else if ($new_hall == 'All' and $new_pos == 'All'){
		$query="SELECT * FROM employee";
	}
	else{
		echo "Wrong selection";
	}
	
	if ($is_query_run=mysqli_query($conn,$query)){
		echo '<table border=1px>';
		echo '<th>ID</th><th>First name</th><th>Last name</th><th>Gender</th><th>Age</th>';
		while($row=mysqli_fetch_array($is_query_run,MYSQL_ASSOC)){
			echo '<tr>';
			echo '<td style="width:100px">'.$row['emp_id'].'</td><td style="width:100px">'.$row['emp_first_name'].'</td><td style="width:100px">'.$row['emp_last_name'].'</td><td style="width:100px">'.$row['emp_gender'].'</td><td>'.$row['emp_age'].'</td>';
			echo '</tr>';
			echo "<br>";
		}
	}
	//}
	else{
		//echo 'error executing';
	}
	//mysql_close($conn);

	}
?>