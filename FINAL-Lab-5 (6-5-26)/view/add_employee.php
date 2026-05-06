<?php
    session_start();
    if(!isset($_SESSION['status']) || $_SESSION['user_type'] != 'Admin'){ header('location: login.php'); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Employee</title>
</head>
<body>
    <h1>Register New Employee</h1>
    <a href='employee_list.php'>Back</a>
    <br><br>

    <!-- Error message paragraph, just like your example[cite: 16] -->
    <p id="msg"></p> 

    <form method="post" action="../controller/masterController.php" id="regForm">
        <input type="hidden" name="action" value="addEmployee">
        
        Name: <input type="text" name="name" id="name"><br><br>
        Contact No: <input type="text" name="contact_no" id="contact"><br><br>
        Username: <input type="text" name="username" id="username"><br><br>
        Password: <input type="password" name="password" id="password"><br><br>
        
        <input type="button" id="btn" value="Register Employee">
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

                document.getElementById('regForm').submit();
            }
        });
    </script>
</body>
</html>