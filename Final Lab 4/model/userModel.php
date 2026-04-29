<?php
require_once('db.php');

function login($user){
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
}

function addUser($user){
    $con = getConnection();
    $sql = "insert into users values(null, '{$user['username']}', '{$user['password']}', '{$user['email']}')";

    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function getUsers(){
    $con = getConnection();

    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die("Query failed: " . mysqli_error($con));
    }

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

