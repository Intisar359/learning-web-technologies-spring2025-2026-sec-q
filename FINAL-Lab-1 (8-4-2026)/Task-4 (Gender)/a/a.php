<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["gender"])) {
        echo "Selected Gender: " . $_POST["gender"];
    } else {
        echo "No gender selected";
    }
}
?>