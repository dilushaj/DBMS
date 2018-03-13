<?php
include 'dbCon.php';
session_start();
$id = $_SESSION['user_id'];

$warden_hall="SELECT hall_name,hall_id FROM warden_hall NATURAL JOIN  hall WHERE warden_id='".$id."' ";
if ($is_query_run=mysqli_query($conn,$warden_hall)) {
    while ($row = mysqli_fetch_array($is_query_run, MYSQL_ASSOC)) {
        $hallName= $row['hall_name'];
        $hallId=$row['hall_id'];
    }
}
?>
<html>

<head>
    <title> warden_student_view </title>
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
                <li class="active">
                    <a href="ui_warden_view_student_list.php">
                        <i class="pe-7s-id"></i>
                        <p>Registered Students</p>
                    </a>
                </li>
                <li>
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
                <fieldset>
                <legend><font size="5"> Registered student List</font></legend>
                 <h5 align="center"><B><?php echo 'HALL  '.strtoupper($hallName)?></B></h5>
                <br>
                <?php
                $count=0;

                $stu_room="SELECT * FROM (student NATURAL JOIN  room) JOIN hall_room USING (room_no) WHERE hall_id IN (SELECT hall_id FROM warden_hall NATURAL JOIN  hall WHERE warden_id='".$id."')ORDER BY room_no,stu_id";
                if ($is_query_run=mysqli_query($conn,$stu_room)) {
                    echo "<br>";
                    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
                    echo '<th>Index No</th><th>Student ID</th><th>Student Name</th><th>Email</th><th>Department</th><th>Year</th><th>Room No</th>';
                    while ($row = mysqli_fetch_array($is_query_run, MYSQL_ASSOC)) {

                        echo '<tr>';
                        echo '<td>'.++$count.'</td>';
                        echo '<td> '.$row['stu_id'].'</td>';
                        echo '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';
                        echo '<td> '.$row['email'].'</td>';
                        echo '<td>'.$row['department'].'</td>';
                        echo '<td> '.$row['year'].'</td>';
                        echo '<td>'.$row['room_no'].'</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                    }


                ?>
                </fieldset>
            </div>
        </div>
</body>
</html>



