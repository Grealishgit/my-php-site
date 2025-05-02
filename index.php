<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="w-full max-w-md">
    <!-- Display message if present -->
   

    <form action="process.php" method="POST" class="bg-white p-8 rounded shadow-md">
       <div id="message" class="mb-4 text-center text-sm font-medium hidden px-4 py-3 rounded"></div>
      <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Sign Up</h2>

      <label class="block mb-4">
        <span class="text-gray-700">Username</span>
        <input type="text" name="name" required class="mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
      </label>

      <label class="block mb-4">
        <span class="text-gray-700">Email</span>
        <input type="email" name="email" required class="mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
      </label>

      <label class="block mb-4">
        <span class="text-gray-700">Password</span>
        <input type="password" name="password" required class="mt-1 block w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
      </label>

      <button type="submit" class="w-full bg-teal-500 text-white font-semibold py-2 px-4 rounded hover:bg-teal-600 transition">
        Sign Up
      </button>

      <p class='mt-2 text-center font-semibold'>Already have an Account? 
        <a href="login.php" class='text-teal-500 cursor-pointer underline'>Login</a>
      </p>
    </form>
  </div>

  <script>
    const params = new URLSearchParams(window.location.search);
    const messageDiv = document.getElementById('message');

    // Check if the status parameter exists
    if (params.has('status')) {
      const status = params.get('status');
      if (status === 'success') {
        messageDiv.textContent = 'Signup successful!';
        messageDiv.classList.add('bg-teal-500', 'text-white', 'block');
        messageDiv.classList.remove('hidden'); // Unhide the message
      } else if (status === 'error') {
        messageDiv.textContent = 'There was an error. Please try again.';
        messageDiv.classList.add('bg-red-100', 'text-red-700', 'block');
        messageDiv.classList.remove('hidden'); // Unhide the message
      }
    }
  </script>
</body>


</html>
