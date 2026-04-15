<?php require 'home.php'; ?>
<?php
// Authentication Guard
if (!isset($_SESSION['current_user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['current_user'];
?>

<div class="main-container">
    <div class="sidebar">
        <h3>Account</h3>
        <hr>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="view_profile.php">View Profile</a></li>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="change_profile_picture.php">Change Profile Picture</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Welcome <?= htmlspecialchars($user['name']) ?></h2>
    </div>
</div>

<?php require 'footer.php'; ?>