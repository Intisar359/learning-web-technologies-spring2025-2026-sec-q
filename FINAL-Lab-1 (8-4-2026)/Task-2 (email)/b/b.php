<!DOCTYPE html>
<html>
<body>

<h2>Email Form</h2>

<form method="post">
    Email: <input type="text" name="email">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (strpos($email, "@") !== false && strpos($email, ".") !== false) {
        echo "<p>Valid Email: $email</p>";
    } else {
        echo "<p>Invalid Email!</p>";
    }
}
?>

</body>
</html>