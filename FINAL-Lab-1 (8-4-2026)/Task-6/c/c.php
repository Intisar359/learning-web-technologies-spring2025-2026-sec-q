<!DOCTYPE html>
<html>
<body>

<?php
$blood = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = $_POST["blood"];
}
?>

<form method="post">
    Blood Group:
    <select name="blood">
        <option value="">Select</option>
        <option value="A+" <?php if($blood=="A+") echo "selected"; ?>>A+</option>
        <option value="B+" <?php if($blood=="B+") echo "selected"; ?>>B+</option>
        <option value="O+" <?php if($blood=="O+") echo "selected"; ?>>O+</option>
    </select>
    <br><br>
    <input type="submit">
</form>

<?php
if ($blood != "") {
    echo "<p>Selected: $blood</p>";
}
?>

</body>
</html>