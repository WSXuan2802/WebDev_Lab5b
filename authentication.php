<?php
    session_start();

include 'database.php';
include 'user.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs using mysqli_real_escape_string
    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    // Validate inputs
    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        // Check if user exists and verify password
        if ($userDetails && password_verify($password, $userDetails['password'])) {
            
            $_SESSION['matric'] = $matric;
            echo '<script> 
                    alert("Login Successful!"); 
                    window.location.href = "table.php"; 
                </script>';
            
        } else {
            echo 'Invalid username or password. try <a href="loginPage.php">login</a> again.';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}
?>