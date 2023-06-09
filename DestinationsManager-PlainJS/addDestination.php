<?php
require_once "utils/configuration.php";

// Get the form data and sanitize it
$location_name = filter_input(INPUT_POST, 'location_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$country_name = filter_input(INPUT_POST, 'country_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$tourist_targets = filter_input(INPUT_POST, 'tourist_targets', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$estimated_cost = filter_input(INPUT_POST, 'estimated_cost', FILTER_SANITIZE_NUMBER_FLOAT);

// Create the prepared statement
global $connection;
$sql_query = "INSERT INTO destinations(location_name, country_name, description, tourist_targets, estimated_cost_per_day) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $sql_query);

// Bind the parameters to the prepared statement
mysqli_stmt_bind_param($stmt, "ssssd", $location_name, $country_name, $description, $tourist_targets, $estimated_cost);

// Execute the statement and check for errors
if (mysqli_stmt_execute($stmt)) {
    echo "Your destination was added successfully!";
} else {
    die("Oops! Something went wrong and your destination cannot be added! Please try again.");
}

// Cleanup
mysqli_stmt_close($stmt);
mysqli_close($connection);
