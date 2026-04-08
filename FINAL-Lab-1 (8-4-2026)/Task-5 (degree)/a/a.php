<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["degree"])) {
        foreach ($_POST["degree"] as $d) {
            echo $d . "<br>";
        }
    } else {
        echo "No degree selected";
    }
}
?>