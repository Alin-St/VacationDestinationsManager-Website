<?php
require_once "utils/configuration.php";

// This script has two working modes:
// If 'operation' query parameter is set to 'retrieve': Returns the entity with the given id.
// If 'operation' is not set or set to 'update': Updates the entity with the new POST values.

global $connection;

$operation = $_GET['operation'] ?? 'update';

if ($operation === 'retrieve') {
    $id = $_GET['id'] ?? die('Id not provided.');

    // Prepare select query
    $sql_query = "SELECT * FROM destinations WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql_query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // Execute the query
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result)
        die("Oops! Something went wrong and your document cannot be updated! Please try again later.");

    // Fetch the destination entity
    $row = mysqli_fetch_assoc($result);
    if (!$row)
        die("Incorrect destination id.");

    // Prepare the entity data for JSON response
    $entity = [
        $row['id'],
        $row['location_name'],
        $row['country_name'],
        $row['description'],
        $row['tourist_targets'],
        $row['estimated_cost_per_day']
    ];

    echo json_encode($entity);

    // Cleanup
    mysqli_stmt_close($stmt);
}
elseif ($operation === 'update') {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
        die("Invalid request method.");

    // Get POST values
    $id = $_POST['id'] ?? '';
    $location_name = $_POST['location_name'] ?? '';
    $country_name = $_POST['country_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $tourist_targets = $_POST['tourist_targets'] ?? '';
    $estimated_cost = $_POST['estimated_cost'] ?? '';

    // Check if all required fields are provided
    if (empty($id) || empty($location_name) || empty($country_name) || empty($description) || empty($tourist_targets) || empty($estimated_cost))
        die('Necessary POST values not provided.');

    // Prepare the SQL statement
    $sql_query = "UPDATE destinations SET location_name=?, country_name=?, description=?, tourist_targets=?, estimated_cost_per_day=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql_query);
    mysqli_stmt_bind_param($stmt, "ssssdi", $location_name, $country_name, $description, $tourist_targets, $estimated_cost, $id);

    // Execute the statement and check for errors
    if (mysqli_stmt_execute($stmt)) {
        echo "Your destination was updated successfully!";
    } else {
        die("Oops! Something went wrong and your document cannot be updated! Please try again later.");
    }

    // Cleanup
    mysqli_stmt_close($stmt);
}
else {
    die("Invalid operation.");
}

mysqli_close($connection);
