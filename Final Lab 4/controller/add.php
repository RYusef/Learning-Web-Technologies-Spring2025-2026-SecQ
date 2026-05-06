<?php
    require_once('../model/userModel.php');

    if(!isset($_COOKIE['status']) || $_COOKIE['role'] != 'admin'){
        header('location: ../view/login.php');
    }

    if(isset($_POST['submit'])){
        $user = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        addUser($user);
        header('location: ../view/user_list.php');
    }else{
        header('location: ../view/add.php');
    }
?>