<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Simple string check (no regex)
    if (strpos($email, "@") !== false && strpos($email, ".") !== false) {
        echo "Valid Email: " . $email;
    } else {
        echo "Invalid Email!";
    }
}
?>