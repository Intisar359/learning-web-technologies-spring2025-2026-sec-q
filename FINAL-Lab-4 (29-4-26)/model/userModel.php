<?php
require_once('db.php');

function login($user){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$user['username']}' AND password='{$user['password']}'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result); 
    }else{
        return false;
    }
}

function isUsernameTaken($username){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0){
        return true; // Username exists
    } else {
        return false; // Username is free
    }
}

function addUser($user){
    $con = getConnection();
    $sql = "INSERT INTO users (username, password, type) VALUES ('{$user['username']}', '{$user['password']}', '{$user['type']}')";
    return mysqli_query($con, $sql);
}

function getUserById($id){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function updateUser($user){
    $con = getConnection();
    $sql = "UPDATE users SET username='{$user['username']}', password='{$user['password']}', type='{$user['type']}' WHERE id='{$user['id']}'";
    return mysqli_query($con, $sql);
}

function deleteUser($id){
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id='{$id}'";
    return mysqli_query($con, $sql);
}
?>