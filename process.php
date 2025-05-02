<?php
// Database connection
$servername = "localhost";
$username = "root";  // Default username in XAMPP
$password = "";      // Default password in XAMPP (blank)
$dbname = "user_db"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate form data
if ($name && $email && $password) {
    // Hash the password (for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query to insert data into the table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the form with a success status
        header('Location: index.html?status=success');
    } else {
        // Redirect to the form with an error status
        header('Location: index.html?status=error');
    }
} else {
    // Redirect to the form with an error status if validation fails
    header('Location: index.html?status=error');
}

$conn->close();
?>
