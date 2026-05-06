<?php
    session_start();
    
    if(!isset($_SESSION['status'])){ 
        header('location: login.php'); 
        exit(); 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Dashboard</title>
</head>
<body>
    <h1>Dashboard - Welcome <?=$_SESSION['current_user']?></h1>
    
    <!-- Only show the Employee Management link if the user is an Admin -->
    <?php if($_SESSION['user_type'] == 'Admin'){ ?>
        <a href='employee_list.php'>Manage Employees</a> |
    <?php } ?>
    
    <!-- Logout routes through the master controller -->
    <a href='../controller/masterController.php?action=logout'>Logout</a>
</body>
</html>