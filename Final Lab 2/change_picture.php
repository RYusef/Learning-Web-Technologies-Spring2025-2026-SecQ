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
?>