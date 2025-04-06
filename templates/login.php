<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, transparent, #ff6b81, #2ecc71, #fdcb6e, #e74c3c, #74b9ff, #89763d, transparent);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
        }
        input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 16px;
        }
        input[type="submit"] {
            background-color: #efa4a4;
            color: #333;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #74b9ff;
        }
        .password-container {
            position: relative;
        }
        .eye {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1 style="color: #ea7982;">ATM Login Form</h1>
            
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" name="password" id="password" required>
                <span class="eye" onclick="togglePasswordVisibility()">👁️</span>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "mydatabase";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Get form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO `login_details` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Account created successfully!");</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }

        // Close the connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>