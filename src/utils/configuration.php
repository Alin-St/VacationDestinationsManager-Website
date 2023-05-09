<?php
$dbServerName = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "wp_destinations_db";
$connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
if ($connection === false) {
    die("ERROR: Could not connect." . mysqli_connect_error());
}
