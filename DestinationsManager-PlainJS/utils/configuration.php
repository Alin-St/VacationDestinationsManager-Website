<?php
$dbServerName = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "wp_destinations_db";

// Establish the database connection
$connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
if (!$connection) {
    die("ERROR: Could not connect." . mysqli_connect_error());
}
