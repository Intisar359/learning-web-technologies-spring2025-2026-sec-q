<?php
    session_start();
    require_once('../model/productModel.php'); 
    // Security check
    if(!isset($_SESSION['status'])){
        header('location: ../view/login.php');
        exit();
    }

    if(isset($_REQUEST['submit'])){
        $name = trim($_REQUEST['name']);
        $quantity = trim($_REQUEST['quantity']);

        if($name == "" || $quantity == ""){
            $_SESSION['error'] = "Fields cannot be empty!";
            header('location: ../view/add_product.php');
            exit();
        } else {
            
           
            $product = ['name' => $name, 'quantity' => $quantity];
            $status = addProduct($product); 

            if($status){
                // Success! Send them back home.
                header('location: ../view/home.php');
                exit();
            } else {
                $_SESSION['error'] = "Database error! Could not add product.";
                header('location: ../view/add_product.php');
                exit();
            }
        }
    } else {
        header('location: ../view/add_product.php');
        exit();
    }
?>