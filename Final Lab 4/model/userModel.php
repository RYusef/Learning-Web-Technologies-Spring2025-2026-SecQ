<?php
require_once('db.php');

function login($user){
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

function addUser($user){
    $con = getConnection();

    if(!isset($user['role'])){
        $user['role'] = 'user';
    }

    $checkSql = "select * from users 
                 where username='{$user['username']}'
                 or email='{$user['email']}'";

    $checkResult = mysqli_query($con, $checkSql);

    if(mysqli_num_rows($checkResult) > 0){
        return "duplicate";
    }

    $sql = "insert into users (username, password, email, role)
            values('{$user['username']}',
                   '{$user['password']}',
                   '{$user['email']}',
                   '{$user['role']}')";

    if(mysqli_query($con, $sql)){
        return "success";
    }else{
        return "failed";
    }
}

function getUsers(){
    $con = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);

    $users = [];

    while($row = mysqli_fetch_assoc($result)){
        $users[] = $row;
    }

    return $users;
}

function getUserById($id){
    $con = getConnection();
    $sql = "select * from users where id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function updateUser($user){
    $con = getConnection();
    $sql = "update users set username='{$user['username']}', password='{$user['password']}', email='{$user['email']}' where id={$user['id']}";
    return mysqli_query($con, $sql);
}

function deleteUser($id){
    $con = getConnection();
    $sql = "delete from users where id={$id}";
    return mysqli_query($con, $sql);
}
?>