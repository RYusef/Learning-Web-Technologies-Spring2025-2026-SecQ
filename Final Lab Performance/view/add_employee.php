<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Register New Employee</h2>

<?php
if(isset($_GET['error'])){
    echo "<p style='color:red'>" . $_GET['error'] . "</p>";
}
?>

<form method="post" action="../controller/employeeController.php">
    Employee Name:
    <input type="text" name="employee_name"><br><br>

    Contact No:
    <input type="text" name="contact_no"><br><br>

    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" name="add" value="Add Employee">
</form>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>