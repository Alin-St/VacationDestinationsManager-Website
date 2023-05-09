<?php
require_once 'utils/configuration.php';
$sql_query = "SELECT * FROM destinations;";
global $connection;
$result = mysqli_query($connection, $sql_query);

if ($result) {
    $number_of_rows = mysqli_num_rows($result);
    $requested_users = array();
    $role = $_GET["role"];
    for ($i = 0; $i < $number_of_rows; $i++) {
        $row = mysqli_fetch_array($result);
        if (str_contains($row["country_name"], $role))
            array_push($requested_users, array($row['id'], $row['location_name'], $row['country_name'],
                $row['description'], $row['tourist_targets'], $row['estimated_cost_per_day']));
    }
    mysqli_free_result($result);
    echo json_encode($requested_users);
}
mysqli_close($connection);
