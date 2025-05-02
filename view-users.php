<?php
// Include the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";  // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users from the database
$sql = "SELECT id, username, email FROM users";  // Replace 'users' with your table name
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<!-- Include the navbar -->
    <?php include('navbar.php'); ?>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Registered Users</h2>

        <!-- Table to display users -->
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b text-left">ID</th>
                    <th class="py-2 px-4 border-b text-left">Name</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["id"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["username"] . "</td>";
                        echo "<td class='py-2 px-4 border-b'>" . $row["email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-2 px-4 text-center text-gray-500'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Back to form link -->
        <div class="mt-6 text-center">
            <a href="index.php" class="text-teal-500 underline">Back to Sign Up</a>
        </div>
    </div>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
