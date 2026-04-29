<?php
require_once('../model/userModel.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    deleteUser($id);
}

header('location: ../view/user_list.php');
?>