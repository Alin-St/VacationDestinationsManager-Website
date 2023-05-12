<?php
require_once 'utils/configuration.php';

// Get the query parameters from the query string
$country_name = $_GET['country_name'] ?? '';
$count_only = isset($_GET['count']);
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * 4;

// Build the SQL query with the WHERE clause for the country_name filter and the LIMIT and OFFSET clauses for pagination
$sql_query = $count_only ?
    "SELECT COUNT(*) FROM destinations WHERE country_name LIKE '%$country_name%'" :
    "SELECT * FROM destinations WHERE country_name LIKE '%$country_name%' LIMIT 4 OFFSET $offset";

// Execute the query and check for errors
global $connection;
$result = mysqli_query($connection, $sql_query);
if (!$result) {
    die('Error: ' . mysqli_error($connection));
}

if ($count_only) {
    $row = mysqli_fetch_row($result);
    $count = (int) $row[0];

    // Return the number of matching destinations.
    echo $count;
}
else {
    // Loop over the result set and build the array of matching destinations
    $requested_destinations = array();
    while ($row = mysqli_fetch_array($result)) {
        $requested_destinations[] = array(
            $row['id'],
            $row['location_name'],
            $row['country_name'],
            $row['description'],
            $row['tourist_targets'],
            $row['estimated_cost_per_day']
        );
    }

    // Return the matching destinations for the requested page
    echo json_encode($requested_destinations);
}

// Cleanup.
mysqli_free_result($result);
mysqli_close($connection);
