<?php
session_start();
$users = $_SESSION['users'] ?? [];
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, '/');
}
session_destroy();
session_start();
$_SESSION['users'] = $users;
header('Location: login.php');
exit;
?>