<?php
    session_start();
    require_once('../model/userModel.php'); 

    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';

        if($username == "" || $password == "" || $type == ""){
            $_SESSION['error'] = "Null username, password, or type!";
            header('location: ../view/reg.html');
            exit();
        } 
        
        
        if(isUsernameTaken($username)){
            $_SESSION['error'] = "Username '{$username}' is already taken. Please choose another.";
            header('location: ../view/reg.html');
            exit();
        }

        
        $user = ['username' => $username, 'password' => $password, 'type' => $type];
        $status = addUser($user); 

        if($status){
            header('location: ../view/login.php');
        } else {
            $_SESSION['error'] = "Database error! Could not register.";
            header('location: ../view/reg.html');
        }
        
    } else {
        header('location: ../view/reg.html');
    }   
?>