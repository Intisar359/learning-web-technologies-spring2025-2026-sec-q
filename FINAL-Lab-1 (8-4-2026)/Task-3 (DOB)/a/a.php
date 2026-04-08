<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yyyy = $_POST["yyyy"];

    if ($dd != "" && $mm != "" && $yyyy != "" &&
        is_numeric($dd) && is_numeric($mm) && is_numeric($yyyy) &&
        $dd >= 1 && $dd <= 31 &&
        $mm >= 1 && $mm <= 12 &&
        strlen($yyyy) == 4) {

        echo "Valid DOB: $dd/$mm/$yyyy";
    } else {
        echo "Invalid Date of Birth!";
    }
}
?>