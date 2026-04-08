<!DOCTYPE html>
<html>
<head>
    <title>Form C</title>
</head>
<body>

<?php
$name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
}
?>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($name != "") {
    echo "<h3>Your name is: $name</h3>";
}
?>

</body>
</html>