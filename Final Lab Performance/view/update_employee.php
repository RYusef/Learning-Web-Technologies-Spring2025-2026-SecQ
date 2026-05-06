<?php
require_once('../model/employeeModel.php');

$id = $_GET['id'];
$employee = getEmployeeById($id);

if(!$employee){
    echo "Employee not found";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
</head>
<body>

<h2>Update Employee Info</h2>

<?php
if(isset($_GET['error'])){
    echo "<p style='color:red'>" . $_GET['error'] . "</p>";
}
?>

<form method="post" action="../controller/employeeController.php">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

    Employee Name:
    <input type="text" name="employee_name" value="<?php echo $employee['employee_name']; ?>"><br><br>

    Contact No:
    <input type="text" name="contact_no" value="<?php echo $employee['contact_no']; ?>"><br><br>

    Username:
    <input type="text" name="username" value="<?php echo $employee['username']; ?>"><br><br>

    Password:
    <input type="text" name="password" value="<?php echo $employee['password']; ?>"><br><br>

    <input type="submit" name="update" value="Update Employee">
</form>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>