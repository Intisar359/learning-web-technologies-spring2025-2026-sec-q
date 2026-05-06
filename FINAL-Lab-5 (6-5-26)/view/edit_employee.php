<?php
    session_start();
    require_once('../model/employeeModel.php');
    
  
    if(!isset($_SESSION['status']) || $_SESSION['user_type'] != 'Admin'){ 
        header('location: login.php'); 
        exit(); 
    }

    $id = $_GET['id'];
    $emp = getEmployeeById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <a href='employee_list.php'>Back</a>
    <br><br>

    <!-- Error message display area -->
    <p id="msg"></p>

    <!-- Form submits to the master controller -->
    <form method="post" action="../controller/masterController.php" id="editForm">
        
        <!-- Tell the master controller what action to run -->
        <input type="hidden" name="action" value="editEmployee">
        
        <!-- Pass the ID securely so the database knows WHO to update -->
        <input type="hidden" name="id" value="<?=$emp['id']?>">
        
        <!-- Pre-fill inputs with existing database values -->
        Name: <input type="text" name="name" id="name" value="<?=$emp['name']?>"><br><br>
        Contact No: <input type="text" name="contact_no" id="contact" value="<?=$emp['contact_no']?>"><br><br>
        Username: <input type="text" name="username" id="username" value="<?=$emp['username']?>"><br><br>
        Password: <input type="password" name="password" id="password" value="<?=$emp['password']?>"><br><br>
        
        <input type="button" id="btn" value="Update Employee">
    </form>

    <script>

        let btn = document.getElementById('btn');
        
        btn.addEventListener('click', function(e) {
            let name = document.getElementById('name');
            let contact = document.getElementById('contact');
            let username = document.getElementById('username');
            let pass = document.getElementById('password');
            let msg = document.getElementById('msg');

            if (name.value == "" || contact.value == "" || username.value == "" || pass.value == "") {
                msg.style.color = 'red';
                msg.innerHTML = "Please fill out all fields first!";
            } else {
                msg.innerHTML = "";

                document.getElementById('editForm').submit();
            }
        });
    </script>
</body>
</html>