

<html>
<head>
<title> Employee Record For Hall </title>

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
    <link rel="stylesheet" href="css/css/pe-icon-7-stroke.css"/>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="green" >

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Employee Manager
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../ui_empm.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
				 </li>
				<li>
                    <a href="../ui_add_employee.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Add Employee</p>
                    </a>
                </li>
               
                <li class>
                    <a href="../ui_change_pass.php">
                        <i class="pe-7s-door-lock"></i>
                        <p>change password</p>
                    </a>
                </li>
                
                <li>
                    <a href="../ui_update_employee.php">
                        <i class="pe-7s-note"></i>
                        <p>Update Employee</p>
                    </a>
                </li>
                <li >
					
                    <a href="view_assigned_employees.php">
                        <i class="pe-7s-id"></i>
                        <p>View Details</p>
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
                            <a href="../loginUser.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
	
<br>

<div class="content">
            <div class="container-fluid">
                <fieldset>
                    <legend><font size="5"> View Registered Employees </font></legend>
                    
					



	 <form action='Employee_list.php' method="POST">
      
        
        
        <fieldset>
		  <label for="Hall_Id";>Hall id:</label>
			
<?php
$conn1 = new PDO('mysql:host=localhost;dbname=semester_db', 'root', '');
$sql="SELECT hall_name FROM Hall";
$stmt = $conn1->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>


<select id="hall_name" name="hall_name">
	<?php foreach($users as $row): ?>      
	<option value="<?=$row['hall_name'];?>"><?=$row['hall_name']; ?></option>
<?php endforeach; ?>	

</select>
<br><br>
<label for="emp_position";>Employee Position:</label>
			
<?php
$conn2 = new PDO('mysql:host=localhost;dbname=semester_db', 'root', '');
$sql2="SELECT distinct emp_position from employee";
$stmt1 = $conn2->prepare($sql2);
$stmt1->execute();
$users1 = $stmt1->fetchAll();
?>


<select id="emp_position" name="emp_position">
	<?php foreach($users1 as $row): ?>      
	<option value="<?=$row['emp_position'];?>"><?=$row['emp_position']; ?></option>
<?php endforeach; ?>	

</select>
			




           
        
		 
          
          
        
        </fieldset>
        <br>
	   <button type="submit" name="view"  value="view" > View Assigned Employees</button>
      </form>
		



	
	<br><br>
	
	


</body>
</html>
