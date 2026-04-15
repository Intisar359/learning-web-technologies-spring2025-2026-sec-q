<?php
session_start();

// Initialize our "database" if it doesn't exist yet
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$isLoggedIn = isset($_SESSION['current_user']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>xCompany</title>
    <style>

        body { font-family: sans-serif; margin: 0; padding: 20px; }
        .header, .footer { border: 1px solid; padding: 10px; display: flex; align-items: center; }
        .header { justify-content: space-between; }
        .footer { justify-content: center; margin-top: 20px; }
        .logo { font-size: 24px; font-weight: bold; }
        .main-container { display: flex; min-height: 400px; border: 1px solid; border-top: none; }
        .sidebar { width: 250px; border-right: 1px solid; padding: 10px; }
        .content { padding: 20px; flex-grow: 1; }
        fieldset { width: fit-content; }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">XCompany</div>
    <div class="nav">
        <?php if ($isLoggedIn): ?>
            Logged in as <a href="view_profile.php"><?= htmlspecialchars($_SESSION['current_user']['name']) ?></a> | 
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="home.php">Home</a> | 
            <a href="login.php">Login</a> | 
            <a href="registration.php">Registration</a>
        <?php endif; ?>
    </div>
</div>