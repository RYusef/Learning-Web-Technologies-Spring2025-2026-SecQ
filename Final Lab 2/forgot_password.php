<?php
session_start();

$message = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $found = false;
    foreach ($_SESSION['users'] ?? [] as $u) {
        if ($u['email'] === $email) {
            $found = true;
            $message = 'Your password is: <strong>' . htmlspecialchars($u['password']) . '</strong>';
            break;
        }
    }
    if (!$found) $error = 'No account found with that email.';
}
?>
<html>
<head>
    <title>xCompany - Forgot Password</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="logo"><span>X</span>Company</div>
        <div class="nav">
            <a href="index.html">Home</a> |
            <a href="login.php">Login</a> |
            <a href="register.php">Registration</a>
        </div>
    </div>
    <div class="content">
        <?php if ($message): ?><p class="success"><?= $message ?></p><?php endif; ?>
        <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>

        <form method="post">
        <fieldset>
            <legend>FORGOT PASSWORD</legend>
            <table>
                <tr><td>Enter Email:</td><td><input type="text" name="email"></td></tr>
            </table>
            <p style="margin-top:8px;"><input type="submit" value="Submit"></p>
        </fieldset>
        </form>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>