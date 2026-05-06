<?php
session_start();
require_once('../model/userModel.php');
require_once('../model/employeeModel.php');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action) {
    case 'login':
        $user = ['username' => trim($_POST['username']), 'password' => trim($_POST['password'])];
        $loggedInUser = login($user); 

        if($loggedInUser){ 
            $_SESSION['status'] = true; 
            $_SESSION['current_user'] = $loggedInUser['username'];
            $_SESSION['user_type'] = $loggedInUser['type']; 
            header('location: ../view/home.php');
        } else {
            $_SESSION['error'] = "Invalid credentials!";
            header('location: ../view/login.php');
        }
        break;

    case 'logout':
        session_destroy();
        header('location: ../view/login.php');
        break;

    case 'addEmployee':
        $username = trim($_POST['username']);


        if (isUsernameTaken($username)) {
            $_SESSION['error'] = "username is taken";
            header('location: ../view/add_employee.php');
            exit(); 
        }

   
        $emp = [
            'name' => trim($_POST['name']),
            'contact_no' => trim($_POST['contact_no']),
            'username' => $username,
            'password' => trim($_POST['password'])
        ];
        
        if(addEmployee($emp)) {
            header('location: ../view/employee_list.php');
        } else {
            echo "Database Error!";
        }
        break;

    case 'searchEmployee':
        
        $payload = json_decode($_POST['payload']); 
        
      
        $query = $payload->search_query; 
        
       
        $employees = searchEmployees($query);
        
        
        echo json_encode($employees); 
        exit(); 
        break;
        
case 'editEmployee':
        $emp = [
            'id' => $_POST['id'], 
            'name' => trim($_POST['name']),
            'contact_no' => trim($_POST['contact_no']),
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password'])
        ];
        
  
        if(updateEmployee($emp)){
            header('location: ../view/employee_list.php');
        } else {
            echo "Database Error! Could not update.";
        }
        break;

    case 'checkUsername':
        $username = trim($_POST['username']);
        if($username != ""){
            if(isUsernameTaken($username)){
               
                echo "<span style='color:red;'>username is taken</span>";
            } else {
                echo "<span style='color:green;'>Username is available!</span>";
            }
        }
        break;

    default:
        header('location: ../view/login.php');
        break;
}
?>