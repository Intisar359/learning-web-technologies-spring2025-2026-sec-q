<?php
$host = "127.0.0.1";
$dbuser = "root";
$dbname = "tech1";
$dbpass = "";

function getConnection(){
    global $host, $dbuser, $dbname, $dbpass;
    $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    if (!$con) die("Database Connection failed: " . mysqli_connect_error());
    return $con;
}
?>