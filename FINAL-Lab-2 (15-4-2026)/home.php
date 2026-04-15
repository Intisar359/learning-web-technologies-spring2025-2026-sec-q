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
        body { font-family: sans-serif; margin: 0; padding: 0; }
        .header, .footer { border: 1px solid #000; padding: 10px; display: flex; justify-content: space-between; align-items: center; }
        .footer { justify-content: center; margin-top: 20px; }
        .logo { color: green; font-size: 24px; font-weight: bold; }
        .main-container { display: flex; min-height: 400px; border: 1px solid #000; border-top: none; }
        .sidebar { width: 250px; border-right: 1px solid #000; padding: 10px; }
        .content { padding: 20px; flex-grow: 1; }
        fieldset { width: fit-content; }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">X<span style="color:black">Company</span></div>
    <div class="nav">
        <?php if ($isLoggedIn): ?>
            Logged in as <a href="view_profile.php"><?= htmlspecialchars($_SESSION['current_user']['name']) ?></a> | 
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="index.php">Home</a> | 
            <a href="login.php">Login</a> | 
            <a href="registration.php">Registration</a>
        <?php endif; ?>
    </div>
</div>
<div class="footer">
    Copyright © 2017
</div>
</body>
</html>