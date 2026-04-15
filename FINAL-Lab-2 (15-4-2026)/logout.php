<?php
session_start();

unset($_SESSION['current_user']);

if (isset($_COOKIE['remembered_user'])) {
    setcookie('remembered_user', '', time() - 3600, "/");
}

header("Location: login.php");
exit;
?>