<?php
    session_start();
    if(isset($_REQUEST['submit'])){
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $quantity = $_REQUEST['quantity'];


        foreach($_SESSION['products'] as $key => $product){
            if($product['id'] == $id){
                $_SESSION['products'][$key]['name'] = $name;
                $_SESSION['products'][$key]['quantity'] = $quantity;
                break;
            }
        }
        header('location: ../view/home.php');
    } else {
        header('location: ../view/home.php');
    }
?>