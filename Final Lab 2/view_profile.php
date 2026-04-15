<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }

$username = $_SESSION['username'];
$user = [];
foreach ($_SESSION['users'] ?? [] as $u) {
    if ($u['username'] === $username) { $user = $u; break; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>xCompany - View Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logo"><span>X</span>Company</div>
        <div class="nav">
            Logged in as <a href="view_profile.php"><?= $user['name'] ?></a> |
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
            <fieldset>
                <legend>PROFILE</legend>
                <table>
                    <tr>
                        <td>
                            <table>
                                <tr><td>Name</td><td>: <?= $user['name'] ?></td></tr>
                                <tr><td>Email</td><td>: <?= $user['email'] ?></td></tr>
                                <tr><td>Gender</td><td>: <?= $user['gender'] ?></td></tr>
                                <tr><td>Date of Birth</td><td>: <?= $user['dob'] ?></td></tr>
                            </table>
                            <p style="margin-top:8px;">
                                <a href="change_picture.php">Change</a> &nbsp;
                                <a href="edit_profile.php">Edit Profile</a>
                            </p>
                        </td>
                        <td style="padding-left:20px; vertical-align:top;">
                            <?php if (!empty($user['picture'])): ?>
                                <img src="<?= $user['picture'] ?>" class="avatar" alt="Profile">
                            <?php else: ?>
                                <svg width="70" height="70" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="40" cy="40" r="40" fill="#ccc"/>
                                    <circle cx="40" cy="30" r="14" fill="#888"/>
                                    <ellipse cx="40" cy="65" rx="22" ry="14" fill="#888"/>
                                </svg>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>