<?php
if(!isset($_COOKIE['status'])){
    header('location: login.php');
}
?>

<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome Home!</h1>

    <p>Logged in as: <?= $_COOKIE['username'] ?></p>
    <p>Role: <?= $_COOKIE['role'] ?></p>

    <?php if($_COOKIE['role'] == 'admin'){ ?>
        <h3>Admin Dashboard</h3>
        <a href="user_list.php">Manage Users</a> |
        <a href="add.php">Add User</a> |
        <a href="../controller/logout.php">Logout</a>
    <?php }else{ ?>
        <h3>User Dashboard</h3>
        <a href="user_list.php">View Users</a> |
        <a href="../controller/logout.php">Logout</a>
    <?php } ?>
</body>
</html>