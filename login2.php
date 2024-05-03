<?php
// Database connection configuration
$servername = "localhost"; // Default server name for WAMP
$username = "root"; // Default username for WAMP
$password = ""; // Default password for WAMP (usually blank)
$dbname = "medic_app"; // Database name containing the 'admin' table

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch admin data
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if there is a matching admin
    if ($result->num_rows > 0) {
        // Redirect to admin.php if login is successful
        header("Location: admin.php");
        exit();
    } else {
        // Redirect back to login2.php if login fails
        header("Location: login2.php");
        exit();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to right, #007bff, #c0c0c0); /* Blue-silver gradient background */
            color: #fff; /* White text color */
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc; /* Light gray border */
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-button {
            width: 100%;
            background-color: #007bff; /* Blue button background color */
            color: #fff; /* White button text color */
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
</body>
</html>
