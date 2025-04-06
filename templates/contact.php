<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mydatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO `contact_form_info` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo '<p style="color: green; text-align: center;">Thank you for contacting us! We will get back to you soon.</p>';
    } else {
        echo '<p style="color: red; text-align: center;">Error: ' . mysqli_error($conn) . '</p>';
    }

    // Close connection
    mysqli_close($conn);
}
?>