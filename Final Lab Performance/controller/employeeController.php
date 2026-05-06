<?php
require_once('../model/employeeModel.php');

if(isset($_GET['key'])){
    $key = $_GET['key'];

    $result = searchEmployee($key);

    echo json_encode($result);
    exit;
}

if(isset($_POST['action']) && $_POST['action'] == "search"){
    $keyword = $_POST['keyword'];

    $employees = searchEmployee($keyword);

    header('Content-Type: application/json');

    echo json_encode([
        "status" => "success",
        "data" => $employees
    ]);

    exit;
}

if(isset($_POST['add'])){
    $name = $_POST['employee_name'];
    $contact = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($name == "" || $contact == "" || $username == "" || $password == ""){
        header('location: ../view/add_employee.php?error=All fields are required');
        exit;
    }

    $employee = [
        'employee_name' => $name,
        'contact_no' => $contact,
        'username' => $username,
        'password' => $password
    ];

    $result = addEmployee($employee);

    if($result === true){
        header('location: ../view/dashboard.php?success=Employee added successfully');
    }else{
        header('location: ../view/add_employee.php?error=' . urlencode($result));
    }

    exit;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['employee_name'];
    $contact = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($id == "" || $name == "" || $contact == "" || $username == "" || $password == ""){
        header('location: ../view/update_employee.php?id=' . $id . '&error=All fields are required');
        exit;
    }

    $employee = [
        'id' => $id,
        'employee_name' => $name,
        'contact_no' => $contact,
        'username' => $username,
        'password' => $password
    ];

    $result = updateEmployee($employee);

    if($result === true){
        header('location: ../view/dashboard.php?success=Employee updated successfully');
    }else{
        header('location: ../view/update_employee.php?id=' . $id . '&error=' . urlencode($result));
    }

    exit;
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $result = deleteEmployee($id);

    if($result === true){
        header('location: ../view/dashboard.php?success=Employee deleted successfully');
    }else{
        header('location: ../view/dashboard.php?error=' . urlencode($result));
    }

    exit;
}
?>