<?php
    session_start();
    require_once('../model/userModel.php'); 

    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);

        if($username == "" || $password == ""){
            $_SESSION['error'] = "Username or password cannot be empty!";
            header('location: ../view/login.php');
            exit();
        } else {
            
            $user = ['username' => $username, 'password' => $password];
            $loggedInUser = login($user); 

            if($loggedInUser){ 

                $_SESSION['status'] = true; 
                $_SESSION['current_user'] = $loggedInUser['username'];
                $_SESSION['user_type'] = $loggedInUser['type']; 
                
                header('location: ../view/home.php');
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password!";
                header('location: ../view/login.php');
                exit();
            }
        }
    } else {
        header('location: ../view/login.php');
        exit();
    }   
?>