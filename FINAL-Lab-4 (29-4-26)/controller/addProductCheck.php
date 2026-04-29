<?php
    session_start();
    if(isset($_REQUEST['submit'])){
        $name = $_REQUEST['name'];
        $quantity = $_REQUEST['quantity'];

        if($name == "" || $quantity == ""){
            echo "Fields cannot be empty!";
        } else {

            $new_id = rand(10, 1000); 
            $new_product = ['id' => $new_id, 'name' => $name, 'quantity' => $quantity];
            
            $_SESSION['products'][] = $new_product;
            header('location: ../view/home.php');
        }
    } else {
        header('location: ../view/add_product.html');
    }
?>