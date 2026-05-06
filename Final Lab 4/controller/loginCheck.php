<?php
require_once('../model/userModel.php');

if(isset($_REQUEST['submit'])){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username == "" || $password == ""){
        echo "null username or password!";
    }else{
        $user = ['username'=>$username, 'password'=>$password];
        $loggedUser = login($user);

        if($loggedUser){
            setcookie('status', 'true', time()+3000, '/');
            setcookie('role', $loggedUser['role'], time()+3000, '/');
            setcookie('username', $loggedUser['username'], time()+3000, '/');

            header('location: ../view/home.php');
        }else{
            header('location: ../view/login.php');
        }
    }
}else{
    header('location: ../view/login.php');
}
?>