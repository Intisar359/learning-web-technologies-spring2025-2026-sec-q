<?php
    session_start();
    if(!isset($_SESSION['status'])){
        header('location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
</head>
<body>
        <h1>Add New Product</h1>
        <a href='home.php'>Back</a> |
        <a href='../controller/logout.php'>Logout</a>
        <br><br>

        <?php 
            if(isset($_SESSION['error'])){
                echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']); 
            }
        ?>

        <form method="post" action="../controller/addProductCheck.php">
            Product Name: <input type="text" name="name" value=""/> <br>
            Quantity: <input type="text" name="quantity" value=""/> <br>
            <input type="submit" name="submit" value="Add"/>
        </form>
</body>
</html>