<?php
    include('../asset/data.php');

    if(isset($_REQUEST['submit'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $role     = $_REQUEST['role'];

        if($username == "" || $password == ""){
            header('location: ../view/login.php?error=Username and password cannot be empty');
        } else {
            $found = false;

            foreach($_SESSION['users'] as $user){
                if($user['username'] == $username && $user['password'] == $password && $user['role'] == $role){
                    $found = true;
                    $_SESSION['auth_user'] = $user;
                }
            }

            if($found == true){
                setcookie('status', 'true', time()+3000, '/');
                header('location: ../view/home.php');
            } else {
                header('location: ../view/login.php?error=Invalid username, password, or role');
            }
        }
    } else {
        header('location: ../view/login.php');
    }
?>
