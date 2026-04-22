<?php
    include('../asset/data.php');

    if(isset($_REQUEST['submit'])){
        $username         = $_REQUEST['username'];
        $email            = $_REQUEST['email'];
        $password         = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];
        $role             = $_REQUEST['role'];

        if($username == "" || $email == "" || $password == "" || $confirm_password == ""){
            header('location: ../view/register.php?error=All fields are required');
        } else if($password != $confirm_password){
            header('location: ../view/register.php?error=Passwords do not match');
        } else {
            $duplicate = false;

            foreach($_SESSION['users'] as $user){
                if($user['username'] == $username){
                    $duplicate = true;
                }
            }

            if($duplicate == true){
                header('location: ../view/register.php?error=Username already exists');
            } else {
                $maxId = 0;
                foreach($_SESSION['users'] as $user){
                    if($user['id'] > $maxId){
                        $maxId = $user['id'];
                    }
                }

                $newUser = array(
                    'id'       => $maxId + 1,
                    'username' => $username,
                    'email'    => $email,
                    'password' => $password,
                    'role'     => $role
                );

                $_SESSION['users'][] = $newUser;
                header('location: ../view/login.php?msg=Registration successful! Please login.');
            }
        }
    } else {
        header('location: ../view/register.php');
    }
?>
