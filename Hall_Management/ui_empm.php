<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link rel="stylesheet" type="text/css" href="../CSS_hall/hall_add2.css">
</head>
<body>
<header>
<font size="5"><h1 align ="center"> Employee Management</h1></font><button2><a href="login.php"><font size="3">Logout</font></a></button2></header>
<br><br>
<form>
<fieldset>
<legend><font size="5"> Menu</font></legend>
<br>
<button type="button" class="button" onclick = "window.location.href='ui_add_employee.php'"> Add Employee </button> <br><br>
<button type="button" class ="button" onclick ="location.href='ui_update_employee.php'"> Update Employee </button> <br><br>
<button type="button" class ="button" onclick ="window.location.href='ui_change_warden.php'"> Change password </button> <br><br>
<button type="button" class ="button" onclick ="window.location.href='emp_view.php'">View Details</button> <br><br>
</fieldset>
</form>
</body>
</html>