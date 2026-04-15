<?php
session_start();

if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

// Auto-login from cookie
if (isset($_COOKIE['remember_user'])) {
    foreach ($_SESSION['users'] ?? [] as $u) {
        if ($u['username'] === $_COOKIE['remember_user']) {
            $_SESSION['username'] = $u['username'];
            header('Location: dashboard.php');
            exit;
        }
    }
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember_me']);

    foreach ($_SESSION['users'] ?? [] as $u) {
        if ($u['username'] === $username && $u['password'] === $password) {
            $_SESSION['username'] = $username;
            if ($remember) {
                setcookie('remember_user', $username, time() + 7 * 24 * 3600, '/');
            }
            header('Location: dashboard.php');
            exit;
        }
    }
    $error = 'Invalid username or password.';
}
?>
<html>
<head>
    <title>xCompany - Login</title>
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
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="post">
        <fieldset>
            <legend>LOGIN</legend>
            <table>
                <tr><td>User Name</td><td>: <input type="text" name="username"></td></tr>
                <tr><td>Password</td><td>: <input type="password" name="password"></td></tr>
            </table>
            <p style="margin-top:6px;"><label><input type="checkbox" name="remember_me"> Remember Me</label></p>
            <p style="margin-top:6px;">
                <input type="submit" value="Submit">
                <a href="forgot_password.php">Forgot Password?</a>
            </p>
        </fieldset>
        </form>
    </div>
    <div class="footer">Copyright &copy; 2017</div>
</div>
</body>
</html>