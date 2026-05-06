<?php
require_once('db.php');

function addEmployee($emp){
    $con = getConnection();
    $sql = "INSERT INTO users (name, contact_no, username, password, type) 
            VALUES ('{$emp['name']}', '{$emp['contact_no']}', '{$emp['username']}', '{$emp['password']}', 'Employee')";
    return mysqli_query($con, $sql);
}

function getAllEmployees(){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE type='Employee'";
    $result = mysqli_query($con, $sql);
    $employees = [];
    while($row = mysqli_fetch_assoc($result)) $employees[] = $row;
    return $employees;
}

function searchEmployees($query){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE type='Employee' AND (name LIKE '%{$query}%' OR username LIKE '%{$query}%' OR contact_no LIKE '%{$query}%')";
    $result = mysqli_query($con, $sql);
    $employees = [];
    while($row = mysqli_fetch_assoc($result)) $employees[] = $row;
    return $employees;
}

function deleteEmployee($id){
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id='{$id}'";
    return mysqli_query($con, $sql);
}
?>