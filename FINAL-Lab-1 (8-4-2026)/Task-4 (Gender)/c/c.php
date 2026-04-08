<!DOCTYPE html>
<html>
<body>

<?php
$gender = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
}
?>

<form method="post">
    Gender:
    <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?>> Other
    <br><br>
    <input type="submit">
</form>

<?php
if ($gender != "") {
    echo "<p>Selected Gender: $gender</p>";
}
?>

</body>
</html>