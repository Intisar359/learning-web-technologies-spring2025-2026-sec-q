<?php
    session_start();
    $id = $_GET['id'];

    foreach($_SESSION['products'] as $key => $product){
        if($product['id'] == $id){
            unset($_SESSION['products'][$key]);
            break;
        }
    }
    
    
    $_SESSION['products'] = array_values($_SESSION['products']);
    
    header('location: ../view/home.php');
?>