<?php
    session_start();
    if (isset($_SESSION['matric'])) {
        header("Location: table.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="text-align: center;">
        <h1>Log In</h1>
        <form action="authentication.php" method="post" style="display: inline-block; text-align: left;">
            <label for="matric">Matric:</label><br>
            <input type="text" name="matric" id="matric" required placeholder="Enter your matric"><br>
            <br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required placeholder="Enter your password"><br>
            <br>
            <input type="submit" name="submit" value="Login" style="margin-left: 40px;">
        </form>
        <p><a href="registrationForm.php">Register</a> here if you have not</p>
    </div>
</body>

</html>