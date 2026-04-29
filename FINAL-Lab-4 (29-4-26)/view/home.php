<?php
    session_start();
    require_once('../model/productModel.php'); 

    if(!isset($_SESSION['status'])){
        header('location: login.php');
        exit();
    }

    
    $products = getAllProducts(); 
    $userType = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
</head>
<body>
        <h1>Welcome Home, <?=$_SESSION['current_user']?> (<?=$userType?>)!</h1>
        
        <?php if($userType == 'Admin'){ ?>
            <a href='add_product.php'>Create Product</a> |
        <?php } ?>
        
        <a href='../controller/logout.php'>Logout</a>
        <br><br>

        <table border=1>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>

            <?php foreach($products as $product){ ?>
            <tr>
                <td><?php echo $product['id'];?></td>
                <td><?php echo $product['name'];?></td>
                <td><?=$product['quantity']?></td>
                <td>
                    <?php if($userType == 'Customer'){ ?>
                        <a href="edit_product.php?id=<?=$product['id']?>">EDIT</a> 
                    <?php } else if($userType == 'Admin') { ?>
                        <a href="../controller/deleteProduct.php?id=<?=$product['id']?>">DELETE</a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
</body>
</html>