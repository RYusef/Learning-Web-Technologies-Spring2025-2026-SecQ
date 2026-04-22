<?php
    include('../asset/data.php');

    unset($_SESSION['auth_user']);
    setcookie('status', 'true', time()-10, '/');
    header('location: ../view/login.php?msg=You have been logged out.');
?>
