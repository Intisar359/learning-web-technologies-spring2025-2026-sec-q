<?php

    $host = "127.0.0.1";
    $dbuser = "root";
    $dbname = "tech"; 
    $dbpass = "";

    function getConnection(){
        global $host;
        global $dbuser;
        global $dbname;
        global $dbpass;
        
        $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
        
        
        if (!$con) {
            die("Database Connection failed: " . mysqli_connect_error());
        }
        
        return $con;
    }

?>