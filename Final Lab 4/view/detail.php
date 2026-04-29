<?php
require_once('../model/userModel.php');

if(!isset($_COOKIE['status'])){
    header('location: login.php');
}

$id = $_GET['id'];
$user = getUserById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>

    <p>ID: <?= $user['id'] ?></p>
    <p>Username: <?= $user['username'] ?></p>
    <p>Email: <?= $user['email'] ?></p>
    

    <a href="user_list.php">Back</a>
</body>
</html>