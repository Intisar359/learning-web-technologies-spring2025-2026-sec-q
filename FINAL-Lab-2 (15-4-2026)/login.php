<?php require 'home.php'; ?>
<?php
// If already logged in, redirect to dashboard
if (isset($_SESSION['current_user'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username]['password'] === $password) {
        
        $_SESSION['current_user'] = $_SESSION['users'][$username];

        if ($remember) {
            setcookie('remembered_user', $username, time() + (86400 * 30), "/"); // 30 days
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<div class="main-container">
    <div class="content" style="display: flex; justify-content: center;">
        <fieldset>
            <legend>LOGIN</legend>
            <span style="color:red;"><?= $error ?></span>
            <form method="POST" action="">
                <table>
                    <tr><td>User Name</td><td>: <input type="text" name="username"></td></tr>
                    <tr><td>Password</td><td>: <input type="password" name="password"></td></tr>
                </table>
                <hr>
                <input type="checkbox" name="remember"> Remember Me<br><br>
                <input type="submit" value="Submit">
                <a href="forgot_password.php">Forgot Password?</a>
            </form>
        </fieldset>
    </div>
</div>

<?php require 'footer.php'; ?>