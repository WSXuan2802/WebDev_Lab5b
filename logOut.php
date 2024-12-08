<?php
    session_start();
    session_destroy();  // Destroy the session
    header("Location: loginPage.php");  // Redirect to login page
    exit();
?>
