<?php

include 'database.php';
include 'user.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Register the user using POST data
$user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

// Close the connection
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
</head>
<body>
    <h1 style="text-align: center;">Registration Successful</h1>
    <button onclick="window.location.href = 'loginPage.php';" style="margin-left: 700px;">Back to login</button>
</body>
</html>