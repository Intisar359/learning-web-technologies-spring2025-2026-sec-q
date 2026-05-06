<?php
require_once('db.php');

function login($user){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$user['username']}' AND password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1) return mysqli_fetch_assoc($result); 
    return false;
}

function isUsernameTaken($username){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result) > 0;
}
?>