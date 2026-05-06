<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location: login.php');
}

require_once('../model/employeeModel.php');
$result = getAllEmployees();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Online Shop Management System</h2>
<h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

<?php
if(isset($_GET['success'])){
    echo "<p style='color:green'>" . $_GET['success'] . "</p>";
}

if(isset($_GET['error'])){
    echo "<p style='color:red'>" . $_GET['error'] . "</p>";
}
?>

<a href="add_employee.php">Add Employee</a> |
<a href="search_employee.php">Search Employee</a> |
<a href="../controller/authController.php?logout=true">Logout</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Contact No</th>
        <th>Username</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['employee_name']; ?></td>
        <td><?php echo $row['contact_no']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td>
            <a href="update_employee.php?id=<?php echo $row['id']; ?>">Update</a> |
            <a href="../controller/employeeController.php?delete=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>