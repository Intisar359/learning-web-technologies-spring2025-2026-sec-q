<?php require 'header.php'; ?>
<?php

if (!isset($_SESSION['current_user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['current_user'];
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';

    if (empty($name) || empty($email) || empty($gender) || empty($dob)) {
        $error = "All fields must be filled!";
    } else {

        $_SESSION['current_user']['name'] = $name;
        $_SESSION['current_user']['email'] = $email;
        $_SESSION['current_user']['gender'] = $gender;
        $_SESSION['current_user']['dob'] = $dob;


        $username = $user['username'];
        $_SESSION['users'][$username]['name'] = $name;
        $_SESSION['users'][$username]['email'] = $email;
        $_SESSION['users'][$username]['gender'] = $gender;
        $_SESSION['users'][$username]['dob'] = $dob;


        $user = $_SESSION['current_user'];
        $success = "Profile updated successfully!";
    }
}
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
        <fieldset>
            <legend>EDIT PROFILE</legend>
            <span class="error"><?= $error ?></span>
            <span class="success"><?= $success ?></span>
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"> <b>i</b></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>: 
                            <input type="radio" name="gender" value="Male" <?= ($user['gender'] === 'Male') ? 'checked' : '' ?>> Male
                            <input type="radio" name="gender" value="Female" <?= ($user['gender'] === 'Female') ? 'checked' : '' ?>> Female
                            <input type="radio" name="gender" value="Other" <?= ($user['gender'] === 'Other') ? 'checked' : '' ?>> Other
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>: <input type="text" name="dob" value="<?= htmlspecialchars($user['dob']) ?>"> <br><i>(dd/mm/yyyy)</i></td>
                    </tr>
                </table>
                <hr>
                <input type="submit" value="Submit">
            </form>
        </fieldset>
    </div>
</div>

<?php require 'footer.php'; ?>