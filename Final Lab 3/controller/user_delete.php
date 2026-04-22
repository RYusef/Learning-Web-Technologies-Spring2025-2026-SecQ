<?php
    include('../asset/data.php');

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: ../view/home.php');
    }

    $id = $_GET['id'];

    if($id == $_SESSION['auth_user']['id']){
        header('location: ../view/user_list.php?msg=You cannot delete your own account');
    } else {
        $newUsers = array();

        foreach($_SESSION['users'] as $user){
            if($user['id'] != $id){
                $newUsers[] = $user;
            }
        }

        $_SESSION['users'] = $newUsers;
        header('location: ../view/user_list.php?msg=User deleted successfully');
    }
?>
