<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
        <form method="post" action="../controller/loginCheck.php">
            <fieldset>
                <legend>Signin</legend>
                
                <?php 
                    if(isset($_SESSION['error'])){
                        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                        unset($_SESSION['error']); 
                    }
                ?>

                Username: <input type="text" name="username" value=""> <br>
                Password: <input type="password" name="password" value=""> <br>
                <input type="submit" name="submit" value="Submit">
                <a href="reg.html">Register Here</a>
            </fieldset>
        </form>
</body>
</html>