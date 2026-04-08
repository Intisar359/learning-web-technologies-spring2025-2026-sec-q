<!DOCTYPE html>
<html>
<body>

<form method="post">
    Degree:
    <input type="checkbox" name="degree[]" value="SSC"> SSC
    <input type="checkbox" name="degree[]" value="HSC"> HSC
    <input type="checkbox" name="degree[]" value="BSc"> BSc
    <input type="checkbox" name="degree[]" value="MSc"> MSc
    <br><br>
    <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["degree"])) {
        foreach ($_POST["degree"] as $d) {
            echo $d . "<br>";
        }
    }
}
?>

</body>
</html>