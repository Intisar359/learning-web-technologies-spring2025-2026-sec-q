<?php
    session_start();

    if(isset($_REQUEST['submit'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';

        if($username == "" || $password == "" || $type == ""){
            echo "Null username, password, or type!";
        } else {

            if(!isset($_SESSION['users'])){
                $_SESSION['users'] = [];
            }
            

            $newUser = ['username' => $username, 'password' => $password, 'type' => $type];
            $_SESSION['users'][] = $newUser;
            
            header('location: ../view/login.php');
        }
    } else {
        header('location: ../view/reg.html');
    }   
?>