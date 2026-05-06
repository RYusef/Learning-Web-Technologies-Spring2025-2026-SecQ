<?php
require_once('../model/userModel.php');

if(!isset($_COOKIE['status']) || $_COOKIE['role'] != 'admin'){
    header('location: ../view/login.php');
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = getUserById($id);

    if($user['role'] != 'admin'){
        deleteUser($id);
    }
}

header('location: ../view/user_list.php');
?>