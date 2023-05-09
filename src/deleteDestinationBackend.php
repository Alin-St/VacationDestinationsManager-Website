<?php
require_once "utils/configuration.php";
global $connection;
if (isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id = $_POST['id'];
    $sql_query = "delete from destinations where id = '$id';";
    $result = mysqli_query($connection, $sql_query);
    if ($result) {
        echo "Your destination was deleted successfully!";
        header("Location: showDestinations.html");
    } else {
        echo "Oops! Something went wrong and your destination cannot be deleted! Please try again later.";
    }
}
mysqli_close($connection);
