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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['picture'])) {
    $file    = $_FILES['picture'];
    $allowed = ['image/jpeg', 'image/png', 'image/gif'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $error = 'Upload error.';
    } elseif (!in_array($file['type'], $allowed)) {
        $error = 'Only JPG, PNG, GIF allowed.';
    } elseif ($file['size'] > 2 * 1024 * 1024) {
        $error = 'File too large (max 2MB).';
    } else {
        $dataUri = 'data:' . $file['type'] . ';base64,' . base64_encode(file_get_contents($file['tmp_name']));
        $_SESSION['users'][$userIndex]['picture'] = $dataUri;
        $user['picture'] = $dataUri;
        $success = 'Profile picture updated!';
    }
}
?>
<html>
<head>
    <title>xCompany - Profile Picture</title>
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
            <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>PROFILE PICTURE</legend>
                <?php if (!empty($user['picture'])): ?>
                    <img src="<?= $user['picture'] ?>" class="avatar" alt="Profile">
                <?php else: ?>
                    <svg width="70" height="70" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" style="display:block;margin-bottom:8px;">
                        <circle cx="40" cy="40" r="40" fill="#ccc"/>
                        <circle cx="40" cy="30" r="14" fill="#888"/>
                        <ellipse cx="40" cy="65" rx="22" ry="14" fill="#888"/>
                    </svg>
                <?php endif; ?>
                <p><input type="file" name="picture" accept="image/*"></p>
                <p><input type="submit" value="Submit"></p>
            </fieldset>
            </form> 
        </div>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>