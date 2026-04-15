<?php require 'header.php'; ?>
<?php

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
            <li><a href="viewprofile.php">View Profile</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <fieldset>
            <legend>PROFILE</legend>
            <table>
                <tr>
                    <td>Name</td>
                    <td>: <?= htmlspecialchars($user['name']) ?></td>
                    <td rowspan="4" style="padding-left: 50px;">
                        <div style="width: 100px; height: 100px; border: 1px solid black; display: flex; align-items: center; justify-content: center;">
                            Pic
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?= htmlspecialchars($user['email']) ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>: <?= htmlspecialchars($user['gender']) ?></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>: <?= htmlspecialchars($user['dob']) ?></td>
                </tr>
            </table>
            <hr>
        </fieldset>
    </div>
</div>

<?php require 'footer.php'; ?>