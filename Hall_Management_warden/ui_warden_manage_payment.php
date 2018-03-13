<?php
include 'dbCon.php';
session_start();
?>
<html>

<head>
    <title> Employee_warden </title>
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
                    Administration
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="ui_warden.php">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="ui_warden_view_room.php">
                        <i class="pe-7s-info"></i>
                        <p>Room Statistics</p>
                    </a>
                </li>
                <li>
                    <a href="ui_warden_vacant_room.php">
                        <i class="pe-7s-note2"></i>
                        <p>Vacant Rooms</p>
                    </a>
                </li>
                <li >
                    <a href="ui_warden_view_student_list.php">
                        <i class="pe-7s-id"></i>
                        <p>Registered Students</p>
                    </a>
                </li>
                <li class="active">
                    <a href="ui_warden_manage_payment.php">
                        <i class="pe-7s-cash"></i>
                        <p>Manage Payments</p>
                    </a>
                </li>
                <li>
                    <a href="ui_warden_view_employee_list.php">
                        <i class="pe-7s-users"></i>
                        <p>Employee List</p>
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

        <form  action="manage_payment.php" method="POST">
            <fieldset>
                <legend> Manage Student Payment</legend>
                <ul class="form">
                    <label><span class="required">Student ID*</span></label>
                <?php
                $connection=new PDO('mysql:host=localhost;dbname=semester_db','root','');
                $id = $_SESSION['user_id'];
                $student_list="SELECT stu_id FROM (student NATURAL JOIN  room) JOIN hall_room USING (room_no) 
                            WHERE hall_id IN 
                            (SELECT hall_id FROM warden_hall NATURAL JOIN  hall WHERE warden_id='".$id."')
                            ORDER BY stu_id";
                $stmt=$connection->prepare($student_list);
                $stmt->execute();
                $users=$stmt->fetchAll();
                ?>
                <select id="stu_id" name="stu_id" class="select">
                    <?php foreach ($users as $row):?>
                    <option value="<?=$row['stu_id'];?>"><?=$row['stu_id'];?></option>
                    <?php endforeach; ?>
                </select>
                <br>
                    <label>Payment*</label>
                    <input type = "text" name= "payment"  required  placeholder="0.00" pattern="([0-9]{1-5}.\d{2})?$/"> </input>
                 <br>
                    <label>Paid date</label>
                    <input type="date" name="pay_date"></ul>
                <br>
                <div id="buttons">
                    <button class="btn-info  btn-lg btn-fill" type="submit" >Update Payment</button>
                </div>

            </fieldset>
        </form>
       </div>
   </div>
</body>
</html>




