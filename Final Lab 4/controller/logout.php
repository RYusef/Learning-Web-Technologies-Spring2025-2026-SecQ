<?php
setcookie('status', 'true', time()-10, '/');
setcookie('role', '', time()-10, '/');
setcookie('username', '', time()-10, '/');

header('location: ../view/login.php');
?>