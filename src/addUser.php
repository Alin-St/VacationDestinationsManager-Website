<?php
$message = "Are you sure you want to continue?";
echo "<script>confirm('$message')</script>";
require_once "utils/configuration.php";
$location_name = $_POST['location_name'];
$country_name = $_POST['country_name'];
$description = $_POST['description'];
$tourist_targets = $_POST['tourist_targets'];
$estimated_cost = $_POST['estimated_cost'];
$sql_query = "insert into destinations(location_name, country_name, description, tourist_targets, estimated_cost_per_day) values ('$location_name', '$country_name', '$description', '$tourist_targets', '$estimated_cost')";
global $connection;
$result = mysqli_query($connection, $sql_query);
if ($result) {
    echo "Your destination was added successfully!";
    header("Location: showUsers.html");
} else {
    echo "Oops!Something went wrong and your destination cannot be added! Please try again later.";
}
mysqli_close($connection);
