<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: loginPage.php");
}

include 'database.php';
include 'user.php';

// Check if the form has been submitted
if (isset($_GET['matric'])) {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Process the update using the matric value
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();
}
// Display the update form with the fetched user data
// Example:
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Information</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div style="display: flex; justify-content: center;">
            <form action="update.php" method="post" style="text-align: left;">
                <h1>Update Information</h1>
                <label for="matric">Matric:</label><br>
                <input type="text" id="matric" name="matric" value="<?php echo $userDetails['matric']; ?>" readonly ><br>
                <br>
                <label for="name">Name:</label><br> 
                <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>"><br>
                <br>
                <label for="role">Role:</label><br>
                <select name="role" id="role" required>
                    <option value="">Please select</option>
                    <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer')
                        echo "selected" ?>>Lecturer</option>
                        <option value="student" <?php if ($userDetails['role'] == 'student')
                        echo "selected" ?>>Student</option>
                    </select><br>
                    <input type="submit" value="Update">
                <button style="margin-top: 20px;" 
                onclick="{window.location.href = 'table.php'; }">Cancel</button>
            </form>
        </div>    
    </body>
</html>