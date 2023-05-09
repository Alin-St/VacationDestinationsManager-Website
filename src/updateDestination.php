<?php
require_once "utils/configuration.php";
global $connection;
$id = "";
$location_name = "";
$country_name = "";
$description = "";
$tourist_targets = "";
$estimated_cost = "";
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    $id = trim($_GET['id']);
    $sql_query = "select * from destinations where id = $id;";
    $result = mysqli_query($connection, $sql_query);
    if ($result) {
        $number_of_rows = mysqli_num_rows($result);
        if ($number_of_rows == 1) {
            $row = mysqli_fetch_array($result);
            $location_name = $row['location_name'];
            $country_name = $row['country_name'];
            $description = $row['description'];
            $tourist_targets = $row['tourist_targets'];
            $estimated_cost = $row['estimated_cost_per_day'];
        } else {
            die("Incorrect destination id");
        }
    } else {
        die("Oops! Something went wrong and your document cannot be updated! Please try again later.");
    }
    mysqli_close($connection);
} else die("Oops! Something went wrong and your document cannot be updated! Please try again later.");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Vacation Destination</title>
    <style>
        <?php include "addDestination.css" ?>
    </style>
</head>

<body>
<div class="container">
    <h1>Update Vacation Destination</h1>
    <p><b>Please fill this form and submit to update the destination in the database.</b></p>

    <form action="updateDestinationBackend.php" method="post">
        <input type="hidden" name="id" value="<?php echo trim($_GET['id']); ?>">
        <input type="text" name="location_name" placeholder="Location Name:" value="<?php echo $location_name ?>"> <br>
        <input type="text" name="country_name" placeholder="Country Name:" value="<?php echo $country_name ?>"> <br>
        <input type="text" name="description" placeholder="Description:" value="<?php echo $description ?>"> <br>
        <input type="text" name="tourist_targets" placeholder="Tourist Targets:" value="<?php echo $tourist_targets ?>"> <br>
        <input type="number" name="estimated_cost" placeholder="Estimated Cost per Day:" value="<?php echo $estimated_cost ?>"> <br>
        <div class="button_container">
            <button type="submit">Update Vacation Destination</button>
            <button type="reset" onclick="window.location.href='showDestinations.html'">Cancel</button>
        </div>
    </form>
</div>
</body>

</html>
