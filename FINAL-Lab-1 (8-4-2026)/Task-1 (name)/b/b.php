<!DOCTYPE html>
<html>
<head>
    <title>B</title>
</head>
<body>

<form method="post">
    Name: <input type="text" name="name">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    echo "<h3>Your name is: $name</h3>";
}
?>

</body>
</html>