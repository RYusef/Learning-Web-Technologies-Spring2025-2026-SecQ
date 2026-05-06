<?php
session_start();
require_once('../model/employeeModel.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == ""){
        echo "Username and password cannot be empty";
    }else{
        $user = login($username, $password);

        if($user){
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header('location: ../view/dashboard.php');
        }else{
            echo "Invalid username or password";
        }
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header('location: ../view/login.php');
}
?>