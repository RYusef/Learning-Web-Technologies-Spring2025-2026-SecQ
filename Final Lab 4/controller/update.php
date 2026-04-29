<?php
require_once('../model/userModel.php');

if(isset($_POST['submit'])){
    $user = [
        'id' => $_POST['id'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    updateUser($user);
    header('location: ../view/user_list.php');
}else{
    header('location: ../view/user_list.php');
}
?>