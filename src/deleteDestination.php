<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Vacation Destination</title>
    <link rel="stylesheet" type="text/css" href="deleteDestination.css">
</head>

<body>
<h1>Delete Vacation Destination</h1>

<div class="container">
    <p><b>Are you sure you want to delete this vacation destination?</b></p>

    <form action="deleteDestinationBackend.php" method="post">
        <input type="hidden" name="id" value="<?php echo trim($_GET['id']); ?>">
        <button type="submit" class="yes">YES</button>
    </form>
    <button class="no" onclick="window.location.href='showDestinations.html'">
        NO
    </button>
</div>
</body>

</html>
