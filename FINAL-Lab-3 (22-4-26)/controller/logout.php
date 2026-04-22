<?php
    session_start();
    setcookie('status', 'true', time()-10, '/');
    session_destroy(); 
    header('location: ../view/login.php');
?>