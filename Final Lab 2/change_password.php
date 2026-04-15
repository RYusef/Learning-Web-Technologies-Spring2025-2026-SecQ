<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }

$username  = $_SESSION['username'];
$userIndex = null;
$user      = [];
foreach ($_SESSION['users'] ?? [] as $i => $u) {
    if ($u['username'] === $username) { $user = $u; $userIndex = $i; break; }
}

$success = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current = $_POST['current_password'] ?? '';
    $new     = $_POST['new_password'] ?? '';
    $retype  = $_POST['retype_password'] ?? '';

    if ($current !== $user['password'])  $error = 'Current password is incorrect.';
    elseif (strlen($new) < 4)           $error = 'New password must be at least 4 characters.';
    elseif ($new !== $retype)            $error = 'New passwords do not match.';
    else {
        $_SESSION['users'][$userIndex]['password'] = $new;
        $success = 'Password changed successfully.';
    }
}
?>
<html>
<head>
    <title>xCompany - Change Password</title>
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
            <?php if ($success): ?><p class="success"><?= $success ?></p><?php endif; ?>
            <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
            <form method="post">
            <fieldset>
                <legend>CHANGE PASSWORD</legend>
                <table>
                    <tr><td>Current Password</td><td>: <input type="password" name="current_password"></td></tr>
                    <tr><td style="color:green;"><b>New Password</b></td><td>: <input type="password" name="new_password"></td></tr>
                    <tr><td style="color:green;"><b>Retype New Password</b></td><td>: <input type="password" name="retype_password"></td></tr>
                </table>
                <p style="margin-top:8px;"><input type="submit" value="Submit"></p>
            </fieldset>
            </form>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>