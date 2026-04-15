<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }
$username = $_SESSION['username'];
?>
<html>
<head>
    <title>xCompany - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logo"><span>X</span>Company</div>
        <div class="nav">
            Logged in as <a href="view_profile.php"><?= htmlspecialchars($username) ?></a> |
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="body">
        <div class="sidebar">
            <b>Account</b>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="view_profile.php">View Profile</a></li>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="change_picture.php">Change Profile Picture</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main">
            <strong>Welcome <?= htmlspecialchars($username) ?></strong>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>