<?php require 'header.php'; ?>
<?php
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';

    if (empty($name) || empty($email) || empty($username) || empty($password)) {
        $error = "All required fields must be filled!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } elseif (isset($_SESSION['users'][$username])) {
        $error = "Username already exists!";
    } else {
 
        $_SESSION['users'][$username] = [
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'gender' => $gender,
            'dob' => $dob
        ];
        $success = "Registration successful! You can now login.";
    }
}
?>

<div class="main-container">
    <div class="content">
        <fieldset>
            <legend>REGISTRATION</legend>
            <span class="error"><?= $error ?></span>
            <span class="success"><?= $success ?></span>
            <form method="POST" action="">
                <table>
                    <tr><td>Name</td><td>: <input type="text" name="name"></td></tr>
                    <tr><td>Email</td><td>: <input type="email" name="email"> <b>i</b></td></tr>
                    <tr><td>User Name</td><td>: <input type="text" name="username"></td></tr>
                    <tr><td>Password</td><td>: <input type="password" name="password"></td></tr>
                    <tr><td>Confirm Password</td><td>: <input type="password" name="confirm_password"></td></tr>
                </table>
                <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female
                    <input type="radio" name="gender" value="Other"> Other
                </fieldset>
                <fieldset>
                    <legend>Date of Birth</legend>
                    <input type="text" name="dob" placeholder="(dd/mm/yyyy)">
                </fieldset>
                <hr>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form>
        </fieldset>
    </div>
</div>


<?php require 'footer.php'; ?>