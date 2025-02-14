<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hometeq';
//create a DB connection

// $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$conn =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//if the DB connection fails, display an error message and exit

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

//select the database

mysqli_select_db($conn, $dbname);

// echo "Connection succesfull";
?>