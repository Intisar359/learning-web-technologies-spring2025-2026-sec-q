<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
    <form method="post" action="../controller/masterController.php">
        <fieldset>
            <legend>Login</legend>
            <?php if(isset($_SESSION['error'])){ echo "<p style='color:red;'>{$_SESSION['error']}</p>"; unset($_SESSION['error']); } ?>
            
            <input type="hidden" name="action" value="login">
            Username: <input type="text" name="username"> <br><br>
            Password: <input type="password" name="password"> <br><br>
            <input type="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>