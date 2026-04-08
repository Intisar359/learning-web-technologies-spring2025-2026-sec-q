<!DOCTYPE html>
<html>
<body>

<?php
$degrees = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["degree"])) {
        $degrees = $_POST["degree"];
    }
}
?>

<form method="post">
    Degree:
    <input type="checkbox" name="degree[]" value="SSC" <?php if(in_array("SSC",$degrees)) echo "checked"; ?>> SSC
    <input type="checkbox" name="degree[]" value="HSC" <?php if(in_array("HSC",$degrees)) echo "checked"; ?>> HSC
    <input type="checkbox" name="degree[]" value="BSc" <?php if(in_array("BSc",$degrees)) echo "checked"; ?>> BSc
    <input type="checkbox" name="degree[]" value="MSc" <?php if(in_array("MSc",$degrees)) echo "checked"; ?>> MSc
    <br><br>
    <input type="submit">
</form>

<?php
if (!empty($degrees)) {
    foreach ($degrees as $d) {
        echo $d . "<br>";
    }
}
?>

</body>
</html>