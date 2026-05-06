<?php
require_once('db.php');

function login($username, $password){
    $con = getConnection();

    $sql = "SELECT * FROM employees 
            WHERE username='$username' AND password='$password'";

    $result = mysqli_query($con, $sql);

    if($result && mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }

    return false;
}

function addEmployee($employee){
    $con = getConnection();

    $name = $employee['employee_name'];
    $contact = $employee['contact_no'];
    $username = $employee['username'];
    $password = $employee['password'];
    $role = "employee";

    $checkSql = "SELECT * FROM employees WHERE username='$username'";
    $checkResult = mysqli_query($con, $checkSql);

    if($checkResult && mysqli_num_rows($checkResult) > 0){
        return "Username already exists";
    }

    $sql = "INSERT INTO employees(employee_name, contact_no, username, password, role)
            VALUES('$name', '$contact', '$username', '$password', '$role')";

    if(mysqli_query($con, $sql)){
        return true;
    }

    return "Employee could not be added";
}

function getAllEmployees(){
    $con = getConnection();

    $sql = "SELECT * FROM employees WHERE role='employee'";
    return mysqli_query($con, $sql);
}

function getEmployeeById($id){
    $con = getConnection();

    $sql = "SELECT * FROM employees WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if($result && mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }

    return false;
}

function updateEmployee($employee){
    $con = getConnection();

    $id = $employee['id'];
    $name = $employee['employee_name'];
    $contact = $employee['contact_no'];
    $username = $employee['username'];
    $password = $employee['password'];

    $checkSql = "SELECT * FROM employees 
                 WHERE username='$username' AND id!='$id'";

    $checkResult = mysqli_query($con, $checkSql);

    if($checkResult && mysqli_num_rows($checkResult) > 0){
        return "Username already exists";
    }

    $sql = "UPDATE employees SET 
            employee_name='$name',
            contact_no='$contact',
            username='$username',
            password='$password'
            WHERE id='$id'";

    if(mysqli_query($con, $sql)){
        return true;
    }

    return "Employee could not be updated";
}

function deleteEmployee($id){
    $con = getConnection();

    $sql = "DELETE FROM employees WHERE id='$id' AND role='employee'";

    if(mysqli_query($con, $sql)){
        return true;
    }

    return "Employee could not be deleted";
}

function searchEmployee($keyword){
    $con = getConnection();

    $sql = "SELECT * FROM employees 
            WHERE employee_name LIKE '%$keyword%' 
            OR contact_no LIKE '%$keyword%' 
            OR username LIKE '%$keyword%'";

    $result = mysqli_query($con, $sql);

    $data = [];

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    return $data;
}
?>