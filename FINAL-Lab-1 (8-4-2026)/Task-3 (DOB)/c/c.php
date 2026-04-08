<!DOCTYPE html>
<html>
<body>

<h2>Date of Birth</h2>

<?php
$dd = $mm = $yyyy = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yyyy = $_POST["yyyy"];
}
?>

<form method="post">
    dd: <input type="text" name="dd" size="2" value="<?php echo $dd; ?>"> /
    mm: <input type="text" name="mm" size="2" value="<?php echo $mm; ?>"> /
    yyyy: <input type="text" name="yyyy" size="4" value="<?php echo $yyyy; ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($dd != "" && $mm != "" && $yyyy != "" &&
        is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy) &&
        $dd >= 1 && $dd <= 31 &&
        $mm >= 1 && $mm <= 12 &&
        strlen($yyyy) == 4) {

        echo "<p>Valid DOB: $dd/$mm/$yyyy</p>";
    } else {
        echo "<p>Invalid Date of Birth!</p>";
    }
}
?>

</body>
</html>