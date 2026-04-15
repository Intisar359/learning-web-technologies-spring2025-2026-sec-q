<!DOCTYPE html>
<html>
<body>

<form method="post">
    Blood Group:
    <select name="blood">
        <option value="">Select</option>
        <option value="A+">A+</option>
        <option value="B+">B+</option>
        <option value="O+">O+</option>
    </select>
    <br><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["blood"] != "") {
        echo "<p>Selected: " . $_POST["blood"] . "</p>";
    }
}
?>

</body>
</html>