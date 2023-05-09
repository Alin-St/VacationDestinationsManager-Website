<?php
require_once "utils/configuration.php";
$id = $_POST['id'];
$location_name = $_POST['location_name'];
$country_name = $_POST['country_name'];
$description = $_POST['description'];
$tourist_targets = $_POST['tourist_targets'];
$estimated_cost = $_POST['estimated_cost'];
$sql_query = "update destinations set location_name='$location_name', country_name = '$country_name', description = '$description', tourist_targets = '$tourist_targets', estimated_cost_per_day = '$estimated_cost' where id = $id";
global $connection;
$result = mysqli_query($connection, $sql_query);
if ($result) {
    echo "Your destination was updated successfully!";
    header("Location: showUsers.html");
} else {
    echo "Oops!Something went wrong and your document cannot be added!Please try again later.";
}
mysqli_close($connection);