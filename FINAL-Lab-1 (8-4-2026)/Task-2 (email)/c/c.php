<!DOCTYPE html>
<html>
<body>

<h2>Email</h2>

<?php
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
}
?>

<form method="post">
    Email: 
    <input type="text" name="email" value="<?php echo $email; ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (strpos($email, "@") !== false && strpos($email, ".") !== false) {
        echo "<p>Valid Email: $email</p>";
    } else {
        echo "<p>Invalid Email!</p>";
    }
}
?>

</body>
</html>