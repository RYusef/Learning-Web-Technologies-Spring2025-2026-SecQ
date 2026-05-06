<?php
if(!isset($_COOKIE['status']) || $_COOKIE['role'] != 'admin'){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>

    <a href="user_list.php">Back</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <form method="post" action="../controller/add.php">
        Username:
        <input type="text" name="username"> <br>

        Email:
        <input type="text" name="email"> <br>

        Password:
        <input type="password" name="password"> <br>

        <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>