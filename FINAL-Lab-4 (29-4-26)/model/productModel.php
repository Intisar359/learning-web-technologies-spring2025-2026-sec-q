<?php
require_once('db.php');

function addProduct($product){
    $con = getConnection();
    // Inserting the name and quantity into the database
    $sql = "INSERT INTO products (name, quantity) VALUES ('{$product['name']}', '{$product['quantity']}')";
    return mysqli_query($con, $sql);
}


function getAllProducts(){
    $con = getConnection();
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    
    $products = [];
    while($row = mysqli_fetch_assoc($result)){
        $products[] = $row;
    }
    return $products;
}

function getProductById($id){
    $con = getConnection();
    $sql = "SELECT * FROM products WHERE id='{$id}'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function updateProduct($product){
    $con = getConnection();
    $sql = "UPDATE products SET name='{$product['name']}', price='{$product['price']}' WHERE id='{$product['id']}'";
    return mysqli_query($con, $sql);
}

function deleteProduct($id){
    $con = getConnection();
    $sql = "DELETE FROM products WHERE id='{$id}'";
    return mysqli_query($con, $sql);
}
?>