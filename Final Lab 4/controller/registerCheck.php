<?php
require_once('../model/userModel.php');

if(isset($_POST['submit'])){

    $user = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'role' => $_POST['role']
    ];

    $status = addUser($user);

    if($status == "success"){
        header('location: ../view/login.php');
    }
    else if($status == "duplicate"){
        echo "Username or Email already exists! <br>";
        echo "<a href='../view/register.php'>Try Again</a>";
    }
    else{
        echo "Registration Failed!";
    }

}else{
    header('location: ../view/register.php');
}
?>