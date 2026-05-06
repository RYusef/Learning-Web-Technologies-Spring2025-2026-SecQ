<?php
require_once('../model/userModel.php');

if(!isset($_COOKIE['status']) || $_COOKIE['role'] != 'admin'){
    header('location: ../view/login.php');
}

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $oldUser = getUserById($id);

    if($oldUser['role'] != 'admin'){
        $user = [
            'id' => $_POST['id'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        updateUser($user);
    }

    header('location: ../view/user_list.php');
}else{
    header('location: ../view/user_list.php');
}
?>