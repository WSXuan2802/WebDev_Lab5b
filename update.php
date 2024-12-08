<?php

include 'database.php';
include 'user.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->updateUser($matric, $name, $role);

    // Check if the update was successful
    if ($user->updateUser($matric, $name, $role)) {
        // Redirect back to the previous page
        header("Location: table.php");
        exit();
    } else {
        echo "Error updating user information!";
    }

    // Close the connection
    $db->close();
}