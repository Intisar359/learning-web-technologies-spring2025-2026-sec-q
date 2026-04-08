<!DOCTYPE html>
<html>
<body>

<form method="post">
    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Other"> Other
    <br><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["gender"])) {
        echo "<p>Selected Gender: " . $_POST["gender"] . "</p>";
    }
}
?>

</body>
</html>