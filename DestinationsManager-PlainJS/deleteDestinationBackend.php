<?php
require_once "utils/configuration.php";
global $connection;

if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id = $_POST['id'];

    // Create the prepared statement
    $sql_query = "DELETE FROM destinations WHERE id = ?";
    $stmt = mysqli_prepare($connection, $sql_query);

    // Bind the parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement and check for errors
    if (mysqli_stmt_execute($stmt)) {
        echo "Your destination was deleted successfully!";
        header("Location: showDestinations.html");
    } else {
        echo "Oops! Something went wrong and your destination cannot be deleted! Please try again later.";
    }

    // Cleanup
    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
