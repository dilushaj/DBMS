<title> Add new employee </title>
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
<body>
<header>
<h3 align =left> <b>Employee Registration Form </b></h3>
<!--<button type="button" name="Back" onclick ="window.location.href='ui_empm.php'"> Back</button>-->

</header>
<br>
<form  action="add_employee.php" method="POST">
  <fieldset>
    <legend> <font size="5">Personal information:</font></legend>
	<label> Employee ID </label> <input type="text" name="id" pattern="[A-Z]{3}+/[0-9]{6}"><br><br>
    <label> First name: </label> <input name= "firstName" type='text' required> </input> <br> <br>
    <label> Last name: </label> <input name= "lastName" type='text' required ></input> <br><br>
	<label> Gender:	 </label> <select  name="gender">   
	<option value="M">Male</option>
    <option value="F">Female</option></select><br><br>
	<label> Telephone Number 1<br>(start with 94 instead of 0):  </label> <input type="text" name="tpNum1"><br><br>
	<label> Telephone Number 2<br>(start with 94 instead of 0):  </label> <input type="text" name="tpNum2"><br><br>
	<label> Age: </label> <input type='number' name="age" min = 18> </input> <br><br>
	<label> DOB: </label> <input type='date' name="DOB" required> </input> <br><br>
	<label for="Poition">Position : </label>
    <select name="position">
  <option value="Cook">Cook</option>
  <option value="Guard">Guard</option>
  <option value="Other1">Other1</option>
  <option value="Other1">Other2</option>
  <option value="Other1">Other3</option>
  <option value="Other1">Other4</option>
</select><br><br>
	<label> Hall: </label> <input type='text' name="hall" pattern='[A-Z]{2}+/[0-9]{4}'required> </input> <br><br>
	<label> Salary: </label> <input type = "text" name= "salary" pattern="([0-9]{1-5}.\d{2})?$/" required > </input> <br><br>
    </fieldset><br>
  <div id = "buttons">
	<button class="btn-info btn-lg btn-fill" type = "submit">Save Changes</button></div>
</form>
 </body>
 </html>
