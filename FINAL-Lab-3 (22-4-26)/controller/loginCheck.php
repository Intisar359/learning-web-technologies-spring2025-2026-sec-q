<?php
    session_start();

    if(isset($_REQUEST['submit'])){
        $username = trim($_REQUEST['username']);
        $password = trim($_REQUEST['password']);

        if($username == "" || $password == ""){

            $_SESSION['error'] = "Username or password cannot be empty!";
            header('location: ../view/login.php');
            exit();
        } else {
            $isValid = false;
            $userType = "";

            if(isset($_SESSION['users'])){
                foreach($_SESSION['users'] as $user){
                    if($user['username'] == $username && $user['password'] == $password){
                        $isValid = true;
                        $userType = $user['type'];
                        break;
                    }
                }
            }

            if($isValid){
                setcookie('status', 'true', time()+3000, '/');
                $_SESSION['current_user'] = $username;
                $_SESSION['user_type'] = $userType; 
                header('location: ../view/home.php');
            } else {

                $_SESSION['error'] = "Invalid username or password! Please register first.";
                header('location: ../view/login.php');
                exit();
            }
        }
    } else {
        header('location: ../view/login.php');
    }   
?>