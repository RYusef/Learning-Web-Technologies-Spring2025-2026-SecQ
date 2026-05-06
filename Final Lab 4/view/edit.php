<?php
require_once('../model/userModel.php');

if(!isset($_COOKIE['status']) || $_COOKIE['role'] != 'admin'){
    header('location: login.php');
}

$id = $_GET['id'];
$user = getUserById($id);

if($user['role'] == 'admin'){
    header('location: user_list.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
</head>
<body>
    <h1>Edit User!</h1>

    <a href='user_list.php'>Back</a> |
    <a href='../controller/logout.php'>Logout</a>

    <br><br>

    <form method="post" action="../controller/update.php">
        ID:
        <input type="text" name="id" readonly value="<?= $user['id'] ?>"> <br>

        Username:
        <input type="text" name="username" value="<?= $user['username'] ?>"> <br>

        Email:
        <input type="text" name="email" value="<?= $user['email'] ?>"> <br>

        Password:
        <input type="text" name="password" value="<?= $user['password'] ?>"> <br>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>