<?php
include 'dbCon.php';
session_start();
?>
<html>
<head>
<title> Student Home Page </title>
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
    <link rel="stylesheet" href="../Hall_Management_warden/css/css/pe-icon-7-stroke.css"/>
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
                <li class="active">
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
                    <a class="navbar-brand" href="#">UNIVERSITY OF SUMANADASA </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
					<li>
							
							<a href="../Hall_Management/stu_change_pass.php">Change Password</a>	
                        </li>
                        <li>
							
							<a href="../Hall_Management/login.php">Log out</a>	
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="content">
            <div class="content">
                <h4 align="center"><B>Welcome to Hall Management System</B></h4>
                <div class="container-fluid">

                    <div class="section" id="carousel">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                <!-- Carousel Card -->
                                <div class="card card-raised card-carousel">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <div class="carousel slide" data-ride="carousel">

                                            <!-- Indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <img src="../Hall_Management_warden/css/images/sumanadasa%20building.jpg" alt="Awesome Image"style="width: 150%; height: 60%">
                                                    <div class="carousel-caption">
                                                        <h4><i class="material-icons">location_on</i> Hall Viharamahadevi,University of Sumanadasa</h4>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <img src="../Hall_Management_warden/css/images/hall.jpg" alt="Awesome Image" style="width: 150%; height: 60%">
                                                    <div class="carousel-caption">
                                                        <h4><i class="material-icons">location_on</i> Hall Dharmaraja,University of Sumanadasa</h4>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <img src="../Hall_Management_warden/css/images/hostels.png" alt="Awesome Image" style="width: 150%; height: 60%">
                                                    <div class="carousel-caption">
                                                        <h4><i class="material-icons">location_on</i> Hall Dutugamunu, University of Sumanadasa</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                <i class="material-icons">keyboard_arrow_left</i>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                <i class="material-icons">keyboard_arrow_right</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Carousel Card -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>


<!--   Core JS Files   -->
<script src="../Hall_Management_warden/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../Hall_Management_warden/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../Hall_Management_warden/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="../Hall_Management_warden/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../Hall_Management_warden/js/bootstrap-notify.js"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../Hall_Management_warden/js/light-bootstrap-dashboard.js"></script>



