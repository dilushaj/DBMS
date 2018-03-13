<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daily UI - Day 1 Sign In</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
<form action="loginUser.php" method="post">
    <div class="container">
        <div class="login-box animated fadeInUp">
            <div class="box-header">
                <h2>University of Sumandasa</h2>
                <h3>hall management system</h3>
            </div>

            <label for="username">Username</label>
            <br/>
            <input type="text" id="username" name="username">
            <br/>
            <label for="password">Password</label>
            <br/>
            <input type="password" id="password" name="password">
            <br/>
            <button type="submit" value="Login">SIGN IN</button>
            <br/>
        </div>
    </div>
</form>
</body>

<script>
    $(document).ready(function () {
        $('#logo').addClass('animated fadeInDown');
        $("input:text:visible:first").focus();
    });
    $('#username').focus(function() {
        $('label[for="username"]').addClass('selected');
    });
    $('#username').blur(function() {
        $('label[for="username"]').removeClass('selected');
    });
    $('#password').focus(function() {
        $('label[for="password"]').addClass('selected');
    });
    $('#password').blur(function() {
        $('label[for="password"]').removeClass('selected');
    });
</script>
</html>
<?php
if ((isset($_POST["username"])) && (isset($_POST["password"]))){

    include 'dbCon.php';

    if (!get_magic_quotes_gpc()){

        $new_username = addslashes($_POST["username"]);
        $new_password1 = addslashes($_POST["password"]);
    }
    else{
        $new_username = $_POST["username"];
        $new_password1 = $_POST["password"];
    }
    echo "<br>";

    $new_password = md5($new_password1);
    session_start();
    $_SESSION['user']=$new_username;
    if (preg_match('^[0-9]{6}[A-Z]{1}^' ,$new_username )){
        $query="SELECT * FROM student WHERE stu_id='".$new_username."'";
        echo "Came here2";
        if ($is_query_run=mysqli_query($conn,$query)){
            while($row=mysqli_fetch_array($is_query_run,MYSQL_ASSOC)){
                if ($new_password1 == $row['password']){
                    $_SESSION['student_id'] = $new_username;
                    header("location: ui_student.php");
                }
                else{
                    echo "There is an error in username or password";
                }
            }
        }
    }
    else{
        $query="SELECT * FROM admin WHERE user_id='".$new_username."'";
        if ($is_query_run=mysqli_query($conn,$query)){
            echo "Came";
            while($row=mysqli_fetch_array($is_query_run,MYSQL_ASSOC)){
                if ($new_password1 == $row['password']){
                    $new_type = $row['position'];
                    if ("$new_type" == "Employee_Manager"){
                        $_SESSION['position'] = "Employee_Manager";
                        header("location: ui_empm.php");
                    }
                    else if ("$new_type" == "Accommodation_Manager"){
                        $_SESSION['position'] = "Accommodation_Manager";
                        header("location: ui_accm.php");
                    }
                    else{
                        $_SESSION['position'] = "Warden";
                        $_SESSION['user_id'] = $new_username;
                        header("location: ui_warden.php");
                    }
                }
                else{
                    echo "There is an error in username or password";
                }
            }
        }
    }
}
?>