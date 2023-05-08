<?php
$message = "Are you sure you want to continue?";
echo "<script>confirm('$message')</script>";
require_once "utils/configuration.php";
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$age = $_POST['age'];
$role = $_POST['role'];
$email = $_POST['email'];
$webpage = $_POST['webpage'];
$sql_query = "insert into users(name, username, password, age, role, email, webpage) values ('$name', '$username', '$password', $age, '$role', '$email', '$webpage')";
global $connection;
$result = mysqli_query($connection, $sql_query);
if ($result) {
    echo "Your user was added successfully!";
    header("Location: showUsers.html");
} else {
    echo "Oops!Something went wrong and your document cannot be added!Please try again later.";
}
mysqli_close($connection);