
<?php
session_start(); // Start the session

// Check if the user is already logged in, if so, redirect to homepage
if (isset($_SESSION['user_id'])) {
    header('Location: homepage.php');
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $sql = "SELECT id, username, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, verify the password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Correct password, start session and redirect to homepage
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            header('Location: homepage.php');
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "No account found with that email!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <form action="login.php" method="POST" class="bg-white p-8 rounded shadow-md shadow-black w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Login</h2>

        <!-- Error message -->
        <?php if ($error): ?>
        <p class="text-red-500 text-center mb-4"><?= $error ?></p>
        <?php endif; ?>

        <label class="block mb-4">
            <span class="text-gray-700">Email</span>
            <input type="email" name="email" placeholder='user@gmail.com' required class="mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </label>

        <label class="block mb-4">
            <span class="text-gray-700">Password</span>
            <input type="password" name="password" placeholder='password' required class="mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
        </label>

        <button type="submit" class="w-full bg-teal-500 text-white font-semibold py-2 px-4 rounded hover:bg-teal-600 transition">
            Login
        </button>

        <p class='mt-2 text-center font-semibold'>
            Don't have an account? <a href="index.php" class='text-teal-500 cursor-pointer underline'>Sign Up</a>
        </p>
    </form>

</body>
</html>
