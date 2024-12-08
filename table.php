<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: loginPage.php");
}

include 'database.php';
include 'user.php';

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);
$result = $user->getUsers();


// if (isset($_SESSION['matric'])) {
//     $matric = $_SESSION['matric'];
// } else {
//     header("Location: table.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 style="text-align: center;">User Table</h1>
    <div style="display: flex; justify-content: center;">
        <table border="1" style="margin: 0 auto;">
            <tr>
                <th >Matric</th>
                <th >Name</th>
                <th >Level</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Fetch each row from the result set
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["matric"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["role"]; ?></td>
                        <td><form action="updatePage.php" method="get"><button class="updateButton" type="submit" name="matric" value="<?php echo $row["matric"]; ?>">Update</button></form></td>
                        <td><form action="delete.php" method="get" onsubmit="return confirm(`Are you sure you want to delete <?php echo $row["name"]; ?> ?`)"><button class="deleteButton" type="submit" name="matric" value="<?php echo $row["matric"]; ?>">Delete</button></form></td>

                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>No users found</td></tr>";
            }
            // Close connection
            $db->close();
            ?>
        </table>
    </div>
    <button style="margin-top: 20px;margin-left: 730px;"
        onclick="if (confirm('Are you sure you want to logout?')) {
            window.location.href = 'logOut.php'; // Redirect to logout.php to destroy session
        }">Logout</button>

</body>

</html>