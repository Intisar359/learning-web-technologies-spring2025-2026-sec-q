<?php
    session_start();
    require_once('../model/employeeModel.php');
    if(!isset($_SESSION['status']) || $_SESSION['user_type'] != 'Admin'){ header('location: login.php'); exit(); }
    $employees = getAllEmployees();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>
    <a href='home.php'>Home</a> | <a href='add_employee.php'>Add Employee</a>
    <br><br>

    Search: <input type="text" id="search" placeholder="Search...">
    <br><br>

    <table border="1" width="60%">
        <tr><th>ID</th><th>Name</th><th>Contact</th><th>Username</th><th>Action</th></tr>
        <tbody id="emp_data">
            <?php foreach($employees as $emp){ ?>
            <tr>
                <td><?=$emp['id']?></td><td><?=$emp['name']?></td><td><?=$emp['contact_no']?></td><td><?=$emp['username']?></td>
                <td><a href="../controller/masterController.php?action=deleteEmployee&id=<?=$emp['id']?>">Delete</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        let searchInput = document.getElementById('search');
        

        searchInput.addEventListener('keyup', function() {
            let query = searchInput.value;
            let xhttp = new XMLHttpRequest();

           
            let data = { 'search_query' : query };
            let jsonData = JSON.stringify(data); 

            xhttp.open('POST', '../controller/masterController.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('action=searchEmployee&payload=' + jsonData); 

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                    let employees = JSON.parse(this.responseText); 
                    let tbody = document.getElementById('emp_data');
                    tbody.innerHTML = ""; 
                    if(employees.length > 0) {
   
                        for(let i = 0; i < employees.length; i++) {
                            tbody.innerHTML += "<tr>" +
                                "<td>" + employees[i].id + "</td>" +
                                "<td>" + employees[i].name + "</td>" +
                                "<td>" + employees[i].contact_no + "</td>" +
                                "<td>" + employees[i].username + "</td>" +
                                "<td><a href='../controller/masterController.php?action=deleteEmployee&id=" + employees[i].id + "'>Delete</a></td>" +
                            "</tr>";
                        }
                    } else {
                        tbody.innerHTML = "<tr><td colspan='5'>No employees found.</td></tr>";
                    }
                }
            };
        });
    </script>
</body>
</html>