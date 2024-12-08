<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="text-align: center;">
        <h1>Registration Form</h1>
        <form action="register.php" method="post" style="display: inline-block; text-align: left;">
            <label for="matric">Matric:</label><br>
            <input type="text" name="matric" id="matric" required style="width: 200px;" placeholder="Enter your matric"><br>
            <br>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" required style="width: 200px;"  placeholder="Enter your name"><br>
            <br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required style="width: 200px;"  placeholder="Enter your password"><br>
            <br>
            <label for="role">Role:</label><br>
            <select name="role" id="role" required style="width: 200px;">
                <option value="">Please select</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select><br>
            <br>
        </form>
        <div style="display: flex; justify-content: center;">
            <input type="submit" name="submit" value="Register" style="margin-right: 10px;">
            <button onclick="window.location.href = 'loginPage.php';">Back</button>
        </div>
    </div>
</body>

</html>
