<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user info from the session
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Welcome, <?= htmlspecialchars($user_name) ?>!</h1>

        <p class="text-gray-600">You are logged in and can access your dashboard.</p>

        <div class="mt-6">
            <a href="view-users.php" class="text-teal-500 hover:underline">View Users</a>
        </div>

        <div class="mt-6">
            <a href="logout.php" class="text-teal-500 hover:underline">Logout</a>
        </div>
    </div>

</body>
</html>
