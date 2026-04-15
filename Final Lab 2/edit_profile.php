<?php
session_start();
if (!isset($_SESSION['username'])) { header('Location: login.php'); exit; }

$username = $_SESSION['username'];
$user = [];
$userIndex = null;
foreach ($_SESSION['users'] ?? [] as $i => $u) {
    if ($u['username'] === $username) { $user = $u; $userIndex = $i; break; }
}

$success = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = trim($_POST['name'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $dob    = trim($_POST['dob'] ?? '');

    if (!$name) $error = 'Name is required.';
    elseif (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $error = 'Valid email required.';
    else {
        $_SESSION['users'][$userIndex]['name']   = $name;
        $_SESSION['users'][$userIndex]['email']  = $email;
        $_SESSION['users'][$userIndex]['gender'] = $gender;
        $_SESSION['users'][$userIndex]['dob']    = $dob;
        $user = $_SESSION['users'][$userIndex];
        $success = 'Profile updated successfully.';
    }
}
?>
<html>
<head>
    <title>xCompany - Edit Profile</title>
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
                <legend>EDIT PROFILE</legend>
                <table>
                    <tr><td>Name</td><td><input type="text" name="name" value="<?= $user['name'] ?>"></td></tr>
                    <tr><td>Email</td><td><input type="email" name="email" value="<?= $user['email'] ?>"></td></tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <label><input type="radio" name="gender" value="Male" <?= $user['gender']==='Male'?'checked':'' ?>> Male</label>
                            <label><input type="radio" name="gender" value="Female" <?= $user['gender']==='Female'?'checked':'' ?>> Female</label>
                            <label><input type="radio" name="gender" value="Other" <?= $user['gender']==='Other'?'checked':'' ?>> Other</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>
                            <input type="text" name="dob" value="<?= $user['dob'] ?>" style="width:110px;">
                            <em>(dd/mm/yyyy)</em>
                        </td>
                    </tr>
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