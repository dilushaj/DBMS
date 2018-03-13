<!DOCTYPE html>
<html>
<head>
<title> Home Page </title>
<link rel="stylesheet" type="text/css" href="../CSS_hall/hall_add2.css">
</head>
<body>
<header>
<font size="5"><h1 align ="center"> Accommodation Management</h1></font><button2><a href="login.php"><font size="3">Logout</font></a></button2></header>
<br><br>
<form>
<fieldset>
<legend><font size="5"> Menu</font></legend>
<br>
<button type="button" class="button" onclick = "window.location.href='ui_add_student.php'"> Add Student </button> 
<button type="button" class ="button" onclick ="location.href='../Update/updateUI.php'"> Update Student </button> 
<button type="button" class ="button" onclick ="window.location.href='ui_change_warden.php'"> Change password </button> 
<button type="button" class ="button" onclick ="window.location.href='ui_add_hall.php'">Add Hall</button> 
<button type="button" class ="button" onclick ="window.location.href='../Update/hallUpdateUI.php'">Update Hall</button> 
<button type="button" class ="button" onclick ="window.location.href='ui_add_room.php'">Add Room</button> 
<button type="button" class ="button" onclick ="window.location.href='../Update/roomUpdateUI.php'">Update Room</button> 
<button type="button" class ="button" onclick ="window.location.href='ui_add_hall.php'">View Student Details</button> 
<button type="button" class ="button" onclick ="window.location.href='ui_update_hall.php'">View Hall Details</button> 
<button type="button" class ="button" onclick ="window.location.href='ui_add_room.php'">View Vacant Room List</button> 
</fieldset>
</form>
</body>
</html>