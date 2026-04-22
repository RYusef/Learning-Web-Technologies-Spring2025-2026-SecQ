<?php
    include('../asset/data.php');

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: ../view/home.php');
    }

    if(isset($_REQUEST['submit'])){
        $id       = $_REQUEST['id'];
        $username = $_REQUEST['username'];
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $role     = $_REQUEST['role'];

        if($username == "" || $email == ""){
            header('location: ../view/user_edit.php?id=' . $id . '&error=Username and email are required');
        } else {
            foreach($_SESSION['users'] as $key => $user){
                if($user['id'] == $id){
                    $_SESSION['users'][$key]['username'] = $username;
                    $_SESSION['users'][$key]['email']    = $email;
                    $_SESSION['users'][$key]['role']     = $role;

                    if($password != ""){
                        $_SESSION['users'][$key]['password'] = $password;
                    }

                    if($_SESSION['auth_user']['id'] == $id){
                        $_SESSION['auth_user'] = $_SESSION['users'][$key];
                    }
                }
            }

            header('location: ../view/user_list.php?msg=User updated successfully');
        }
    } else {
        header('location: ../view/user_list.php');
    }
?>
