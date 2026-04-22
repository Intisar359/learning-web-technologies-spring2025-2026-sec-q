<?php
    session_start();
    if(!isset($_COOKIE['status'])){ header('location: login.html'); }

    $products = $_SESSION['products'];
    $id = $_GET['id'];
    $current_product = [];

    foreach($products as $p){
        if($id == $p['id']){
            $current_product = $p;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
</head>
<body>
        <h1>Edit Product</h1>
        <a href='home.php'>Back</a> |
        <a href='../controller/logout.php'>Logout</a>
        <br><br>

        <form method="post" action="../controller/updateProductCheck.php">
            ID: <input type="text" name="id" readonly value="<?=$current_product['id']?>"/> <br>
            NAME: <input type="text" name="name" value="<?=$current_product['name']?>"/> <br>
            QUANTITY: <input type="text" name="quantity" value="<?=$current_product['quantity']?>"/> <br>
            <input type="submit" name="submit" value="Update"/>
        </form>
</body>
</html>