<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["blood"] != "") {
        echo "Selected Blood Group: " . $_POST["blood"];
    } else {
        echo "No selection";
    }
}
?>